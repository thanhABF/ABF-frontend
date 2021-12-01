<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Exchanges;
use App\Models\PositionsClosed;
use App\Models\PositionsOpen;
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

class CoinPilotController extends Controller
{


    public function test2() {
      $dayStart = '2020-10-29';
      $tmp = CurrencyRate::where('CloseDate','=',$dayStart)->first();
      if (!empty($tmp)) {
        $exchange_rate = $tmp->btc_close;
        if (empty($exchange_rate)) {
          //continue;
        }
      } else {
        //continue;
      }
      print_r($tmp->btc_close);
    }

    public function test() {

      $balances = Balance::where('user_id','=',auth()->user()->id)->get()->toArray();
      $balance = $balances[0]['balance'];

      //return view();



      /*
      $commission_rate = 0.2;
      $quote = 'BTC';
      $users = User::get()->toArray();
      foreach($users as $user) {
        $user_id = $user['id'];

        $dayStart = Carbon::now()->subDays(0)->format('Y-m-d');

        for ($x = 0; $x <= 30; $x++) {
          $dayStart = Carbon::parse($dayStart)->subDays(1)->format('Y-m-d');

          $NetProfit = PositionsClosed::where([['user_id','=',$user_id],['CloseDate','LIKE','%'.$dayStart.'%'],['pair','LIKE','%'.$quote]])->sum('NetProfit');
          if($NetProfit != 0 and $NetProfit != null) {
            if($quote == 'USDT') {
              $exchange_rate = '1';
              $NetProfitExchange = $NetProfit;
            } else {
              $tmp = CurrencyRate::where('CloseDate','=',$dayStart)->first();
              if (!empty($tmp)) {
                  if($quote == 'BTC') {
                      $exchange_rate = $tmp->btc_close;
                  }
                  if($quote == 'ETH') {
                      $exchange_rate = $tmp->eth_close;
                  }
                  if($quote == 'BNB') {
                      $exchange_rate = $tmp->bnb_close;
                  }
                  if (empty($exchange_rate)) {
                      continue;
                  }
                  $NetProfitExchange = (float)$NetProfit * (float)$exchange_rate;
              } else {
                continue;
              }

            }
            $commission = (float)$NetProfit * (float)$commission_rate;
            $commission_usd = (float)$NetProfitExchange * (float)$commission_rate;
            echo $dayStart." NetProfit: ".$NetProfit." Commission: ".$commission;
            //print_r($NetProfit);
            echo "<br>";

            $tmp = Commissions::where([['user_id','=',$user_id],['date','=',$dayStart]])->first();
            if(!empty($tmp)) {
              if($quote == 'USDT') {
                $total_commission_usd = (float)$tmp->btc_commission_usd + (float)$commission_usd + (float)$tmp->eth_commission_usd + (float)$tmp->bnb_commission_usd;
                Commissions::where([['user_id','=',$user_id],['date','=',$dayStart]])->update([
                  'usdt_profit' => $NetProfit,
                  'usdt_rate' => $exchange_rate,
                  'usdt_commission' => $commission,
                  'usdt_commission_usd' => $commission_usd,
                  'total_commission_usd' => $total_commission_usd
                ]);
              }
              if($quote == 'BTC') {
                $total_commission_usd = (float)$commission_usd + (float)$tmp->usdt_commission_usd + (float)$tmp->eth_commission_usd + (float)$tmp->bnb_commission_usd;
                Commissions::where([['user_id','=',$user_id],['date','=',$dayStart]])->update([
                  'btc_profit' => number_format($NetProfit, 8, '.', ''),
                  'btc_rate' => $exchange_rate,
                  'btc_commission' => number_format($commission, 8, '.', ''),
                  'btc_commission_usd' => $commission_usd,
                  'total_commission_usd' => $commission_usd
                ]);
              }
            } else {
              if($quote == 'USDT') {
                Commissions::create([
                    'date' => $dayStart,
                    'user_id' => $user_id,
                    'usdt_profit' => $NetProfit,
                    'usdt_rate' => $exchange_rate,
                    'usdt_commission' => $commission,
                    'usdt_commission_usd' => $commission_usd,
                    'total_commission_usd' => $commission_usd
                ]);
              }
              if($quote == 'BTC') {
                Commissions::create([
                    'date' => $dayStart,
                    'user_id' => $user_id,
                    'btc_profit' => number_format($NetProfit, 8, '.', ''),
                    'btc_rate' => $exchange_rate,
                    'btc_commission' => number_format($commission, 8, '.', ''),
                    'btc_commission_usd' => $commission_usd,
                    'total_commission_usd' => $commission_usd
                ]);
              }
            }
          }

        }


      }
      */
    }

    public function referral_detect($link) {
      $user = User::where('referral_link','=',$link)->select('id')->limit(1)->get();
      if(isset($user[0]->id)) {
        $invited_by_user_id = $user[0]->id;
        if(!empty($invited_by_user_id)) {
          Cookie::queue('referral_id', $invited_by_user_id, 43200);
        }
      }
      return redirect()->route('index');
    }

    // this is matt taylor's custom referral link
    public function getstarted() {
      $user = User::where('email','=','charlieskogen@gmail.com')->select('id')->limit(1)->get();
      if(isset($user[0]->id)) {
        $invited_by_user_id = $user[0]->id;
        if(!empty($invited_by_user_id)) {
          Cookie::queue('referral_id', $invited_by_user_id, 43200);
        }
      }
      return redirect()->route('index');
    }

    public function referral_detect2() {
      $referral_id = Cookie::get('referral_id');
      echo $referral_id;
    }

    public function dark_mode() {
      $dark_mode = Cookie::get('dark_mode');
      //echo $dark_mode;
      if($dark_mode == 0) {
        Cookie::queue('dark_mode', '1', 43200);
      } else {
        Cookie::queue('dark_mode', '0', 43200);
      }
      return redirect()->back();
    }

    public function index() {
      $quote = 'BTC';

      $invested = PositionsClosed::where([['user_id','=',auth()->user()->id],['pair','LIKE','%'.$quote]])->sum('Invested');
      $invested = number_format((float)$invested, 8, '.', ' ');

      $profit = PositionsClosed::where([['user_id','=',auth()->user()->id],['pair','LIKE','%'.$quote]])->sum('NetProfit');
      $profit = number_format((float)$profit, 8, '.', ' ');

      $amount_trades = PositionsClosed::where([['user_id','=',auth()->user()->id],['pair','LIKE','%'.$quote]])->count();

      if(!empty($timestampCheck = PositionsClosed::where([['user_id','=',auth()->user()->id],['pair','LIKE','%'.$quote]])->orderBy('CloseDateTimestamp','desc')->select('CloseDateTimestamp')->first())) {
          $timestampCheck = PositionsClosed::where([['user_id','=',auth()->user()->id],['pair','LIKE','%'.$quote]])->orderBy('CloseDateTimestamp','desc')->select('CloseDateTimestamp')->first()->toArray();
      }
      if(isset($timestampCheck['CloseDateTimestamp'])){
        $lastTimestamp = $timestampCheck['CloseDateTimestamp'];
        $firstTimestamp = $lastTimestamp - 60 * 60 * 24 * 30;

        $lastDay = Carbon::createFromTimestampUTC($lastTimestamp)->format('d M Y');
        $firstDay = Carbon::createFromTimestampUTC($firstTimestamp)->format('d M Y');

        $firstDate = Carbon::createFromTimestampUTC($firstTimestamp)->subDays(1)->format('Y-m-d');

        $profit_chart = "[";
        $date_chart = "[";
        $netprofitpercent_chart = "[";
        $_profit = 0;
        for ($x = 0; $x <= 30; $x++) {
          $firstDate = Carbon::parse($firstDate)->addDay(1)->format('Y-m-d');
          $netProfit = PositionsClosed::where([['user_id','=',auth()->user()->id],['pair','LIKE','%'.$quote],['CloseDate','LIKE','%'.$firstDate.'%']])->sum('NetProfit');
          $netProfit = number_format((float)$netProfit + $_profit, 8, '.', ' ');
          $profit_chart = $profit_chart.strval($netProfit).",";
          $_profit = $netProfit;

          $invested_c = PositionsClosed::where([['user_id','=',auth()->user()->id],['pair','LIKE','%'.$quote],['CloseDate','LIKE','%'.$firstDate.'%']])->sum('Invested');
          $invested_c = round((float)$invested_c, 8);
          if((float)$invested_c == 0) {
            $NetProfitPercent = 0;
          } else {
            $NetProfitPercent = ((((float)$invested_c + (float)$netProfit) * 100) / (float)$invested_c) - 100;
            $NetProfitPercent = round((float)$NetProfitPercent, 2);
          }

          $netprofitpercent_chart = $netprofitpercent_chart.'"'.$NetProfitPercent.'",';

          $tempDay = Carbon::parse($firstDate)->format('d M');
          $date_chart = $date_chart.'"'.$tempDay.'",';
        }

        $profit_chart = substr($profit_chart,0,-1);
        $profit_chart = $profit_chart."]";

        $date_chart = substr($date_chart,0,-1);
        $date_chart = $date_chart."]";

        $netprofitpercent_chart = substr($netprofitpercent_chart,0,-1);
        $netprofitpercent_chart = $netprofitpercent_chart."]";
      } else {
        $profit_chart = "[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]";
        $date_chart = "[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]";
        $netprofitpercent_chart = "[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]";
        $lastDay = Carbon::now()->format('d M Y');
        $firstDay = Carbon::now()->format('d M Y');
      }
      $return = round($profit + $invested,8);
      $balance = Balance::where('user_id','=',auth()->user()->id)->get()->toArray()[0]['balance'];
      return view('dashboard.index', compact('balance', 'invested', 'profit', 'return', 'amount_trades', 'profit_chart', 'date_chart', 'lastDay', 'firstDay', 'netprofitpercent_chart'));
    }

    public function indext() {
      $quote = 'USDT';

      $invested = PositionsClosed::where([['user_id','=',auth()->user()->id],['pair','LIKE','%'.$quote]])->sum('Invested');
      $invested = number_format((float)$invested, 2, '.', ' ');

      $profit = PositionsClosed::where([['user_id','=',auth()->user()->id],['pair','LIKE','%'.$quote]])->sum('NetProfit');
      $profit = number_format((float)$profit, 2, '.', ' ');

      $amount_trades = PositionsClosed::where([['user_id','=',auth()->user()->id],['pair','LIKE','%'.$quote]])->count();

      if(!empty($timestampCheck = PositionsClosed::where([['user_id','=',auth()->user()->id],['pair','LIKE','%'.$quote]])->orderBy('CloseDateTimestamp','desc')->select('CloseDateTimestamp')->first())) {
          $timestampCheck = PositionsClosed::where([['user_id','=',auth()->user()->id],['pair','LIKE','%'.$quote]])->orderBy('CloseDateTimestamp','desc')->select('CloseDateTimestamp')->first()->toArray();
      }
      if(isset($timestampCheck['CloseDateTimestamp'])){
        $lastTimestamp = $timestampCheck['CloseDateTimestamp'];
        $firstTimestamp = $lastTimestamp - 60 * 60 * 24 * 30;

        $lastDay = Carbon::createFromTimestampUTC($lastTimestamp)->format('d M Y');
        $firstDay = Carbon::createFromTimestampUTC($firstTimestamp)->format('d M Y');

        $firstDate = Carbon::createFromTimestampUTC($firstTimestamp)->subDays(1)->format('Y-m-d');

        $profit_chart = "[";
        $date_chart = "[";
        $netprofitpercent_chart = "[";
        $_profit = 0;
        for ($x = 0; $x <= 30; $x++) {
          $firstDate = Carbon::parse($firstDate)->addDay(1)->format('Y-m-d');
          $netProfit = PositionsClosed::where([['user_id','=',auth()->user()->id],['pair','LIKE','%'.$quote],['CloseDate','LIKE','%'.$firstDate.'%']])->sum('NetProfit');
          $netProfit = number_format((float)$netProfit + $_profit, 2, '.', ' ');
          $profit_chart = $profit_chart.strval($netProfit).",";
          $_profit = $netProfit;

          $invested_c = PositionsClosed::where([['user_id','=',auth()->user()->id],['pair','LIKE','%'.$quote],['CloseDate','LIKE','%'.$firstDate.'%']])->sum('Invested');
          $invested_c = round((float)$invested_c, 2);
          if((float)$invested_c == 0) {
            $NetProfitPercent = 0;
          } else {
            $NetProfitPercent = ((((float)$invested_c + (float)$netProfit) * 100) / (float)$invested_c) - 100;
            $NetProfitPercent = round((float)$NetProfitPercent, 2);
          }

          $netprofitpercent_chart = $netprofitpercent_chart.'"'.$NetProfitPercent.'",';

          $tempDay = Carbon::parse($firstDate)->format('d M');
          $date_chart = $date_chart.'"'.$tempDay.'",';
        }

        $profit_chart = substr($profit_chart,0,-1);
        $profit_chart = $profit_chart."]";

        $date_chart = substr($date_chart,0,-1);
        $date_chart = $date_chart."]";

        $netprofitpercent_chart = substr($netprofitpercent_chart,0,-1);
        $netprofitpercent_chart = $netprofitpercent_chart."]";
      } else {
        $profit_chart = "[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]";
        $date_chart = "[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]";
        $netprofitpercent_chart = "[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]";
        $lastDay = Carbon::now()->format('d M Y');
        $firstDay = Carbon::now()->format('d M Y');
      }
      $return = round($profit + $invested,2);
      $balance = Balance::where('user_id','=',auth()->user()->id)->get()->toArray()[0]['balance'];
      return view('dashboard.indext', compact('balance', 'invested', 'profit', 'return', 'amount_trades', 'profit_chart', 'date_chart', 'lastDay', 'firstDay', 'netprofitpercent_chart'));
    }

    public function positions() {
      $closedPositions = array();
      $closedPositionsTemp = PositionsClosed::where('user_id','=',auth()->user()->id)->orderBy('id','desc')->get()->toArray();
      foreach($closedPositionsTemp as $position) {
        array_push($closedPositions, array(
          'OpenDate' => Carbon::parse($position['OpenDate'])->format('Y-m-d H:i'),
          'CloseDate' => Carbon::parse($position['CloseDate'])->format('Y-m-d H:i'),
          'Pair' => $position['Pair'],
          'Invested' => number_format($position['Invested'], 8, '.', ''),
          'EntryPrice' => number_format($position['EntryPrice'], 8, '.', ''),
          'ExitPrice' => number_format($position['ExitPrice'], 8, '.', ''),
          'Profit' => number_format($position['Profit'], 8, '.', ''),
          'Fees' => number_format($position['Fees'], 8, '.', ''),
          'NetProfit' => number_format($position['NetProfit'], 8, '.', ''),
          'NetProfitPercent' => number_format(round($position['NetProfitPercent'], 2), 2, '.', ''),
        ));
      }

      $openPositions = array();
      $openPositionsTemp = PositionsOpen::where('user_id','=',auth()->user()->id)->orderBy('id','desc')->get()->toArray();
      foreach($openPositionsTemp as $position) {
        array_push($openPositions, array(
          'OpenDate' => $position['OpenDate'],
          'Pair' => $position['Pair'],
          'Invested' => number_format($position['Invested'], 8, '.', ''),
          'EntryPrice' => number_format($position['EntryPrice'], 8, '.', ''),
        ));
      }

      $balance = Balance::where('user_id','=',auth()->user()->id)->get()->toArray()[0]['balance'];
      return view('dashboard.positions', compact('balance', 'closedPositions', 'openPositions'));
    }

    public function exchange_connect() {
      $balance = Balance::where('user_id','=',auth()->user()->id)->get()->toArray()[0]['balance'];
      if((float)$balance < 0) {
        return redirect()->route('dashboard.invoices');
      }
      return view('dashboard.exchange_connect', compact('balance'));
    }

    public function exchange_list() {
      $exchanges = Exchanges::where('user_id','=',auth()->user()->id)->orderBy('id','desc')->get()->toArray();

      $balance = Balance::where('user_id','=',auth()->user()->id)->get()->toArray()[0]['balance'];
      if((float)$balance < 0) {
        return redirect()->route('dashboard.invoices');
      }

      return view('dashboard.exchange_list', compact('balance', 'exchanges'));
    }

    public function invoices() {
      $balance = 0;
      if(!empty($balance = Balance::where('user_id','=',auth()->user()->id)->first())) {
        $balance = Balance::where('user_id','=',auth()->user()->id)->get()->toArray();
        $balance = $balance[0]['balance'];
      }

      $unpaid_commission = Commissions::where([
        ['user_id','=',auth()->user()->id],
        ['status','=','unpaid'],
      ])->sum('total_commission_usd');
      $unpaid_commission = round($unpaid_commission, 2, PHP_ROUND_HALF_UP);

      $commissions = array();
      if(!empty($commissions = Commissions::where('user_id','=',auth()->user()->id)->first())) {
        $commissions = Commissions::where('user_id','=',auth()->user()->id)->get()->toArray();
      }

      $payments = array();
      if(!empty($payments = PaymentsHistory::where('user_id','=',auth()->user()->id)->first())) {
        $payments = PaymentsHistory::where('user_id','=',auth()->user()->id)->get()->toArray();
      }

      return view('dashboard.invoices', compact('balance', 'payments', 'unpaid_commission', 'commissions'));
    }

    public function referral() {
      $balance = BalanceReferral::where('user_id','=',auth()->user()->id)->limit(1)->get();
      $balance_referral = 0;
      if(isset($balance[0]->id)) {
        $balance_referral = $balance[0]->balance;
      }

      $invited_users = User::where('invited_by_user_id','=',auth()->user()->id)->count();
      $invited_active_users = User::where([['invited_by_user_id','=',auth()->user()->id],['status','=','active']])->count();
      $referral_level = 0;
      if($invited_active_users >= 3) { $referral_level = 1; }
      if($invited_active_users >= 5) { $referral_level = 2; }
      if($invited_active_users >= 10) { $referral_level = 3; }
      if($invited_active_users >= 25) { $referral_level = 4; }
      if($invited_active_users >= 50) { $referral_level = 5; }


      //Get referral link
      $referral = User::where('id','=',auth()->user()->id)->limit(1)->get();
      $referral_link = '';
      if(isset($referral[0]->id)) {
        $referral_link = $referral[0]->referral_link;
      }

      $withdrawal = ReferralWithdrawal::where('user_id','=',auth()->user()->id)->get();
      if(!isset($withdrawal[0]->id)) {
        $withdrawal = array();
      }

      $balance = Balance::where('user_id','=',auth()->user()->id)->get()->toArray()[0]['balance'];
      return view('dashboard.referral', compact('balance', 'referral_link', 'balance_referral', 'invited_users', 'invited_active_users', 'referral_level', 'withdrawal'));
    }

    public function help_setup() {
      $balance = Balance::where('user_id','=',auth()->user()->id)->get()->toArray()[0]['balance'];
      return view('dashboard.help_setup', compact('balance'));
    }

    public function help_faq() {
      $balance = Balance::where('user_id','=',auth()->user()->id)->get()->toArray()[0]['balance'];
      return view('dashboard.help_faq', compact('balance'));
    }


    public function referral_link_duplicates($link) {
      $unique = User::where('referral_link','=',$link)->select('id')->limit(1)->get();
      if(isset($unique[0]->id)) {
        return 'error';
      } else {
        return 'ok';
      }
    }

    public function referral_link_save(Request $request) {
      $link = $request->input('referral_link');
      $unique = User::where('referral_link','=',$link)->select('id')->limit(1)->get();
      if(!isset($unique[0]->id)) {
        if(!empty($link)) {
          User::where('id','=',auth()->user()->id)->update([
            'referral_link' => $link
          ]);
        }
      }
      return redirect()->back();
    }

    public function withdrawal_referral_balance(Request $request) {
      $transfer_amount = (float)$request->input('amount');
      $transfer_currency = $request->input('currency');
      $transfer_wallet = $request->input('wallet');

      $referral_balance = BalanceReferral::where('user_id','=',auth()->user()->id)->get();
      $current_referral_balance = 0;
      if(isset($referral_balance[0]->id)) {
        $current_referral_balance = (float)$referral_balance[0]->balance;
      }

      $new_referral_balance = $current_referral_balance - $transfer_amount;
      if($new_referral_balance < 0) {
        return redirect()->route('dashboard.referral')->with('error', 'Insufficient balance');
      } else {

        $balance = Balance::where('user_id','=',auth()->user()->id)->get();
        $current_balance = 0;
        if(isset($balance[0]->id)) {
          $current_balance = (float)$balance[0]->balance;
        }
        $new_balance = $current_balance + $transfer_amount;

        BalanceReferral::where('user_id','=',auth()->user()->id)->update(['balance' => $new_referral_balance]);
        Balance::where('user_id','=',auth()->user()->id)->update(['balance' => $new_balance]);
        $current_date = Carbon::now()->format('Y-m-d')."T".Carbon::now()->format('H:i:s')."Z";

        ReferralWithdrawal::create([
            'user_id' => auth()->user()->id,
            'target' => 'wallet',
            'amount' => $transfer_amount,
            'currency' => $transfer_currency,
            'wallet' => $transfer_wallet,
            'status' => 'queue'
        ]);
        return redirect()->route('dashboard.referral')->with('success', 'Withdrawal request was successful added to the queue');
      }
    }

    public function transfer_referral_balance(Request $request) {
      $transfer_amount = (float)$request->input('amount');
      $referral_balance = BalanceReferral::where('user_id','=',auth()->user()->id)->get();
      $current_referral_balance = 0;
      if(isset($referral_balance[0]->id)) {
        $current_referral_balance = (float)$referral_balance[0]->balance;
      }

      $new_referral_balance = $current_referral_balance - $transfer_amount;
      if($new_referral_balance < 0) {
        return redirect()->route('dashboard.referral')->with('error', 'Insufficient balance');
      } else {

        $balance = Balance::where('user_id','=',auth()->user()->id)->get();
        $current_balance = 0;
        if(isset($balance[0]->id)) {
          $current_balance = (float)$balance[0]->balance;
        }
        $new_balance = $current_balance + $transfer_amount;

        BalanceReferral::where('user_id','=',auth()->user()->id)->update(['balance' => $new_referral_balance]);
        Balance::where('user_id','=',auth()->user()->id)->update(['balance' => $new_balance]);
        $current_date = Carbon::now()->format('Y-m-d')."T".Carbon::now()->format('H:i:s')."Z";
        PaymentsHistory::create([
            'date' => $current_date,
            'user_id' => auth()->user()->id,
            'local_currency' => 'USD',
            'local_amount' => $transfer_amount,
            'status' => 'referral:transfer'
        ]);
        ReferralWithdrawal::create([
            'user_id' => auth()->user()->id,
            'target' => 'coinpilot',
            'amount' => $transfer_amount,
            'currency' => 'USD',
            'status' => 'success'
        ]);
        return redirect()->route('dashboard.referral')->with('success', 'Transfer was successful');
      }

    }

    public function terms() {
      $balance = Balance::where('user_id','=',auth()->user()->id)->get()->toArray()[0]['balance'];
      return view('dashboard.terms', compact('balance'));
    }

    public function privacy() {
      $balance = Balance::where('user_id','=',auth()->user()->id)->get()->toArray()[0]['balance'];
      return view('dashboard.privacy', compact('balance'));
    }

    public function exchange_add(Request $request) {
      Exchanges::create([
          'user_id' => auth()->user()->id,
          'name' => $request->input('name'),
          'exchange_based' => $request->input('exchange_based'),
          'api_key' => $request->input('api_key'),
          'api_secret' => $request->input('api_secret'),
          'api_passphrase' => $request->input('api_passphrase'),
          'status' => 'checking',
          'dca' => 'yes',
          'subaccount' => $request->input('subaccount'),
          'quote_asset' => $request->input('quote_asset'),
      ]);
      return redirect()->route('dashboard.exchange.list');
    }

    public function edit_api(Request $request) {
      if($request->input('status')=="stopped") {
        Exchanges::where([['user_id','=',auth()->user()->id],['id','=',$request->input('exchange_id')]])->update([
          'status' => $request->input('status'),
          'quote_asset'=> $request->input('quote_asset'),
        ]);
      }elseif($request->input('status')=="checking"){
        Exchanges::where([['user_id','=',auth()->user()->id],['id','=',$request->input('exchange_id')]])->update([
          'status' => $request->input('status'),
          'quote_asset'=> $request->input('quote_asset'),
        ]);
      }
      Exchanges::where([['user_id','=',auth()->user()->id],['id','=',$request->input('exchange_id')]])->update([
        'dca' => $request->input('exchange_dca')
      ]);

      return redirect()->route('dashboard.exchange.list');
    }

    public function exchange_api($id) {
      $exchange = Exchanges::where([['user_id','=',auth()->user()->id],['id','=',$id]])->get()->toArray();
      if(empty($exchange)){
        return redirect()->route('dashboard.exchange.list');
      } else {
        $exchange_id = $id;

        $balance = Balance::where('user_id','=',auth()->user()->id)->get()->toArray()[0]['balance'];
        if((float)$balance < 0) {
          return redirect()->route('dashboard.invoices');
        }

        return view('dashboard.exchange_api', compact('balance', 'exchange','exchange_id'));
      }
    }

    public function exchange_delete($id) {
      $exchange = Exchanges::where([['user_id','=',auth()->user()->id],['id','=',$id]])->get()->toArray();
      if(empty($exchange)){
        return redirect()->route('dashboard.exchange.list');
      } else {
        $exchange_id = $id;

        $balance = Balance::where('user_id','=',auth()->user()->id)->get()->toArray()[0]['balance'];
        if((float)$balance < 0) {
          return redirect()->route('dashboard.invoices');
        }

        return view('dashboard.exchange_delete', compact('balance', 'exchange','exchange_id'));
      }
    }

    public function exchange_delete_approve(Request $request) {
      Exchanges::where([['user_id','=',auth()->user()->id],['id','=',$request->input('exchange_id')]])->delete();
      return redirect()->route('dashboard.exchange.list');
    }

    public function CoinbaseCreatePayment(Request $request) {
      $user_id = auth()->user()->id;
      $user_email = auth()->user()->email;

      $currency = 'USD';
      $amount = $request->input('usd');
      $coin_for_payment = $request->input('coin');

      if($coin_for_payment == 'BTC') {
        $api_key = env('COINBASE_API_BTC');
        ApiClient::init($api_key);

        $chargeName = 'Deposit balance: '.$user_email;

        if ($amount < 25) {
          $amount = 25;
        }

        //Create charges
        $chargeData = [
            'name' => $chargeName,
            'description' => 'Deposit balance. Coinpilot.com',
            'local_price' => [
                'amount' => $amount,
                'currency' => $currency
            ],
            'pricing_type' => 'fixed_price',
            'redirect_url' => route('dashboard.invoices'),
            'cancel_url' => route('dashboard.invoices')
        ];

        //Get values of the payment
        $charge = Charge::create($chargeData);
        $payment_id = $charge['id'];
        foreach ($charge['timeline'] as $st) {
          $status = 'charge:created';
          $paymentDate = $st['time'];
        }
        $hosted_url = $charge['hosted_url'];
        $local_amount = $charge['pricing']['local']['amount'];
        $local_currency = $charge['pricing']['local']['currency'];
        //$bch = $charge['pricing']['bitcoincash']['amount'];
        //$ltc = $charge['pricing']['litecoin']['amount'];
        $btc = $charge['pricing']['bitcoin']['amount'];
        //$eth = $charge['pricing']['ethereum']['amount'];
        //$usdc = $charge['pricing']['usdc']['amount'];
        //$dai = $charge['pricing']['dai']['amount'];

        $payment_records = PaymentsHistory::where('user_id','=',$user_id)->where('coinbase_id','=',$payment_id)->first();

        if(empty($payment_records)){
            PaymentsHistory::create([
                'user_id' => $user_id,
                'date' => $paymentDate,
                'coinbase_id' => $payment_id,
                'hosted_url' => $hosted_url,
                'local_currency' => $local_currency,
                'local_amount' => $local_amount,
                'btc' => $btc,
                //'bch' => $bch,
                //'eth' => $eth,
                //'usdc' => $usdc,
                //'ltc' => $ltc,
                //'dai' => $dai,
                'status' => $status
            ]);
        }
      } else {
        $api_key = env('COINBASE_API');
        ApiClient::init($api_key);

        $chargeName = 'Deposit balance: '.$user_email;

        if ($amount < 5) {
          $amount = 5;
        }

        //Create charges
        $chargeData = [
            'name' => $chargeName,
            'description' => 'Deposit balance. Coinpilot.com',
            'local_price' => [
                'amount' => $amount,
                'currency' => $currency
            ],
            'pricing_type' => 'fixed_price',
            'redirect_url' => route('dashboard.invoices'),
            'cancel_url' => route('dashboard.invoices')
        ];

        //Get values of the payment
        $charge = Charge::create($chargeData);
        $payment_id = $charge['id'];
        foreach ($charge['timeline'] as $st) {
          $status = 'charge:created';
          $paymentDate = $st['time'];
        }
        $hosted_url = $charge['hosted_url'];
        $local_amount = $charge['pricing']['local']['amount'];
        $local_currency = $charge['pricing']['local']['currency'];
        $bch = $charge['pricing']['bitcoincash']['amount'];
        $ltc = $charge['pricing']['litecoin']['amount'];
        //$btc = $charge['pricing']['bitcoin']['amount'];
        $eth = $charge['pricing']['ethereum']['amount'];
        $usdc = $charge['pricing']['usdc']['amount'];
        $dai = $charge['pricing']['dai']['amount'];

        $payment_records = PaymentsHistory::where('user_id','=',$user_id)->where('coinbase_id','=',$payment_id)->first();

        if(empty($payment_records)){
            PaymentsHistory::create([
                'user_id' => $user_id,
                'date' => $paymentDate,
                'coinbase_id' => $payment_id,
                'hosted_url' => $hosted_url,
                'local_currency' => $local_currency,
                'local_amount' => $local_amount,
                //'btc' => $btc,
                'bch' => $bch,
                'eth' => $eth,
                'usdc' => $usdc,
                'ltc' => $ltc,
                'dai' => $dai,
                'status' => $status
            ]);
        }
      }

      return redirect()->to($hosted_url);
    }

}
