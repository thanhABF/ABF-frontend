<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Exchanges;
use App\Models\PositionsClosed;
use App\Models\PaymentsHistory;
use App\Models\WebhookCoinbase;
use App\Models\Balance;
use App\Models\Commissions;
use App\Models\CurrencyRate;
use App\Models\BalanceReferral;
use App\Models\ReferralWithdrawal;
use CoinbaseCommerce\ApiClient;
use CoinbaseCommerce\Resources\Checkout;
use CoinbaseCommerce\Resources\Charge;
use CoinbaseCommerce\Resources\Event;
use Cookie;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Support\Facades\Auth;
use Lab404\Impersonate\Models\Impersonate;

class AdminController extends Controller
{

    public function index() {
      //$role = Role::create(['name' => 'admin']);
      //$user = User::where('id','=','1')->get();
      //$user[0]->assignRole('admin');
      $users_return = array();
      $users = User::get()->toArray();
      foreach($users as $user) {
        $email_verified_at = 'Yes';
        if(empty($user['email_verified_at'])) {
          $email_verified_at = 'No';
        }
        $commission_rate = '20';
        if(!empty($user['commission'])) {
          $commission_rate = (float)$user['commission'] * 100;
          $commission_rate = round($commission_rate, 0);
        }
        if($user['commission'] == '0') { $commission_rate = 0; }

        $balance = Balance::where('user_id','=',$user['id'])->get();
        $balance = $balance[0]->balance;

        $unpaid_commission = Commissions::where([['user_id','=',$user['id']],['status','=','unpaid']])->sum('total_commission_usd');
        //print_r($unpaid_commission);

        $made_payments = 'No';
        $previousPayments = PaymentsHistory::where([['user_id','=',$user['id']],['status','=','charge:confirmed']])
        ->orWhere([['user_id','=',$user['id']],['status','=','charge:resolved']])->select('id')->get();
        if(isset($previousPayments[0]->id)) {
          $made_payments = 'Yes';
        }

        $exchanges = Exchanges::where([['user_id','=',$user['id']],['status','=','connected']])->get();
        $exchange_status = '';
        $amount_exchanges = 0;
        if(isset($exchanges[0]->id)) {
          $exchange_status = 'connected';
          $amount_exchanges = count($exchanges);
        }

        array_push($users_return, array(
          'id' => $user['id'],
          'email' => $user['email'],
          'verified' => $email_verified_at,
          'registered' => Carbon::parse($user['created_at'])->format('Y-m-d H:i'),
          'made_payments' => $made_payments,
          'balance' => $balance,
          'unpaid_commission' => round($unpaid_commission, 2),
          'commission_rate' => $commission_rate,
          'exchange_status' => $exchange_status,
          'invited_by_user_id' => $user['invited_by_user_id'],
        ));
      }

      return view('admin.index', compact('users_return'));
    }

    public function referral() {
      return view('admin.referral');
    }

    public function user($id) {
      $user_return = array();
      $users = User::where('id','=',$id)->get()->toArray();
      $user = $users[0];
      //print_r($user);

      $email_verified_at = 'Yes';
      if(empty($user['email_verified_at'])) {
        $email_verified_at = 'No';
      }
      $commission_rate = '20';
      if(!empty($user['commission'])) {
        $commission_rate = (float)$user['commission'] * 100;
        $commission_rate = round($commission_rate, 0);
      }
      if($user['commission'] == '0') { $commission_rate = 0; }

      $balance = Balance::where('user_id','=',$user['id'])->get();
      $balance = $balance[0]->balance;

      $unpaid_commission = Commissions::where([['user_id','=',$user['id']],['status','=','unpaid']])->sum('total_commission_usd');


      $exchanges = Exchanges::where([['user_id','=',$id],['status','=','connected']])->get();
      $exchange_status = '';
      $amount_exchanges = 0;
      if(isset($exchanges[0]->id)) {
        $exchange_status = 'connected';
        $amount_exchanges = count($exchanges);
      }

      $made_payments = 'No';
      $previousPayments = PaymentsHistory::where([['user_id','=',$id],['status','=','charge:confirmed']])
      ->orWhere([['user_id','=',$id],['status','=','charge:resolved']])->select('id')->get();
      if(isset($previousPayments[0]->id)) {
        $made_payments = 'Yes';
      }


      $balance_r = BalanceReferral::where('user_id','=',$id)->limit(1)->get();
      $balance_referral = 0;
      if(isset($balance_r[0]->id)) {
        $balance_referral = $balance_r[0]->balance;
      }


      $invited_users = User::where('invited_by_user_id','=',$id)->count();
      $invited_active_users = User::where([['invited_by_user_id','=',$id],['status','=','active']])->count();
      $referral_level = 0;
      if($invited_active_users >= 3) { $referral_level = 1; }
      if($invited_active_users >= 5) { $referral_level = 2; }
      if($invited_active_users >= 10) { $referral_level = 3; }
      if($invited_active_users >= 25) { $referral_level = 4; }
      if($invited_active_users >= 50) { $referral_level = 5; }


      $user_return = array(
        'id' => $user['id'],
        'first_name' => $user['first_name'],
        'last_name' => $user['last_name'],
        'email' => $user['email'],
        'verified' => $email_verified_at,
        'registered' => Carbon::parse($user['created_at'])->format('Y-m-d H:i'),
        'first_invoice' => '',
        'balance' => $balance,
        'unpaid_commission' => round($unpaid_commission, 2),
        'commission_rate' => $commission_rate,
        'exchange_status' => $exchange_status,
        'amount_exchanges' => $amount_exchanges,
        'made_payments' => $made_payments,
        'balance_referral' => $balance_referral,
        'invited_users' => $invited_users,
        'invited_active_users' => $invited_active_users,
        'referral_level' => $referral_level,
      );

      return view('admin.user', compact('user_return'));
    }

    public function topup_user_balance(Request $request) {
      $amount_deposit = (float)$request->input('amount');
      $user_id = $request->input('user_id');

      if(!empty($user_balance = Balance::where('user_id', '=', $user_id)->first())) {
        $user_balance = Balance::where('user_id', '=', $user_id)->get()->toArray();
      } else {
        $user_balance = array();
      }

      if (!empty($user_balance)) {
          $current_balance = $user_balance[0]['balance'];
          $total_balance = (float)$current_balance + (float)$amount_deposit;
          Balance::where('user_id', '=', $user_id)->update(['balance' => $total_balance]);
      } else {
          Balance::create([
              'user_id' => $user_id,
              'balance' => $amount_deposit
          ]);
      }

      $current_date = Carbon::now()->format('Y-m-d')."T".Carbon::now()->format('H:i:s')."Z";
      PaymentsHistory::create([
          'date' => $current_date,
          'user_id' => $user_id,
          'local_currency' => 'USD',
          'local_amount' => $amount_deposit,
          'status' => 'admin:bonus'
      ]);

      return redirect()->route('admin.user', $user_id)->with('success', 'Top-up balance was successful');

    }

    public function user_commission_rate(Request $request) {
      $commission_rate = (float)$request->input('commission_rate');
      $user_id = $request->input('user_id');

      $commission_rate = $commission_rate / 100;
      $commission_rate = round($commission_rate, 2);
      if($commission_rate >= 0 and $commission_rate <= 1) {
        User::where('id', '=', $user_id)->update(['commission' => $commission_rate]);
        return redirect()->route('admin.user', $user_id)->with('success', 'The commission rate changed successfully');
      } else {
        return redirect()->route('admin.user', $user_id)->with('error', 'Commission rate range must be from 0 to 100');
      }

    }

    public function impersonate($id) {
      $user_return = array();
      $users = User::where('id','=',$id)->get();
      $user = $users[0];

      if(auth()->user()->hasRole('admin') == '1') {
        Cookie::queue('imp', $user->id, 6000);
        Auth::user()->impersonate($user);
        return redirect()->route('dashboard.index');
      }

    }

    public function leaveImpersonation() {
      Cookie::expire('imp');
      Auth::user()->leaveImpersonation();
      return redirect()->route('admin.index');
    }


}
