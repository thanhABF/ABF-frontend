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
use CoinbaseCommerce\ApiClient;
use CoinbaseCommerce\Resources\Checkout;
use CoinbaseCommerce\Resources\Charge;
use CoinbaseCommerce\Resources\Event;

class CoinbaseController extends Controller
{

    public function handle(Request $request) {
        // get the content of request body
        $getContent = $request->getContent();
        WebhookCoinbase::create(['response' => $getContent]);

        // decode json and covert to array
        $getContent = json_decode($getContent, true);

        $payment_id = $getContent['event']['data']['id'];
        $status = $getContent['event']['type'];

        $previous_status = CoinbaseController::getPaymentStatus($payment_id);

        PaymentsHistory::where('coinbase_id','=',$payment_id)->update(['status' => $status]);

        if ($previous_status != 'charge:confirmed') {
            if ($previous_status != 'charge:resolved') {
                if ($previous_status != 'Pending') {

                    if ($status == 'charge:confirmed') {
                        CoinbaseController::depositBalance($payment_id, $status);
                    } elseif ($status == 'charge:resolved') {
                        foreach ($getContent['event']['data']['payments'] as $pm) {
                            if ($pm['status'] == 'CONFIRMED') {
                                $new_amount_to_deposit = $pm['value']['local']['amount'];
                            }
                        }
                        CoinbaseController::depositBalanceResolved($payment_id, $new_amount_to_deposit);
                        PaymentsHistory::where('coinbase_id', '=', $payment_id)->update(['status' => $status]);
                    }

                }
            }
        }
    }

    public static function depositBalanceResolved($payment_id, $new_amount_to_deposit) {
        if(!empty($payment = PaymentsHistory::where('coinbase_id', '=', $payment_id)->first())) {
          $payment = PaymentsHistory::where('coinbase_id', '=', $payment_id)->get()->toArray();
        } else {
          $payment = array();
        }

        if (!empty($payment)) {
            PaymentsHistory::where('coinbase_id', '=', $payment_id)->update(['usdc' => $new_amount_to_deposit]);
            $user_id = $payment[0]['user_id'];

            if(!empty($user_balance = Balance::where('user_id', '=', $user_id)->first())) {
              $user_balance = Balance::where('user_id', '=', $user_id)->get()->toArray();
            } else {
              $user_balance = array();
            }

            if (!empty($user_balance)) {
                $current_balance = $user_balance[0]['balance'];
                $total_balance = (float)$current_balance + (float)$new_amount_to_deposit;
                Balance::where('user_id', '=', $user_id)->update(['balance' => $total_balance]);
            } else {
                Balance::create([
                    'user_id' => $user_id,
                    'balance' => $new_amount_to_deposit
                ]);
            }
        }
    }

    public static function getPaymentStatus($payment_id) {
        $status = '';
        $payment = PaymentsHistory::where('coinbase_id', '=', $payment_id)->first();
        if (!empty($payment)) {
            $status = $payment->status;
        }
        return $status;
    }

    public static function depositBalance($payment_id, $status) {
        if(!empty($payment = PaymentsHistory::where('coinbase_id', '=', $payment_id)->first())) {
          $payment = PaymentsHistory::where('coinbase_id', '=', $payment_id)->get()->toArray();
        } else {
          $payment = array();
        }
        if (!empty($payment)) {
            $user_id = $payment[0]['user_id'];
            $amount_deposit = $payment[0]['local_amount'];

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

        }

    }

    public static function test() {
      $payment_id = '00000000-0000-0000-0000-000000000000';
      $status = 'charge:resolved';
      $new_amount_to_deposit = 100;

      if(!empty($payment = PaymentsHistory::where('coinbase_id', '=', $payment_id)->first())) {
        $payment = PaymentsHistory::where('coinbase_id', '=', $payment_id)->get()->toArray();
      } else {
        $payment = array();
      }

      if (!empty($payment)) {
          PaymentsHistory::where('coinbase_id', '=', $payment_id)
              ->update([
                  'usdc' => $new_amount_to_deposit
              ]);

          $user_id = $payment[0]['user_id'];

          if(!empty($user_balance = Balance::where('user_id', '=', $user_id)->first())) {
            $user_balance = Balance::where('user_id', '=', $user_id)->get()->toArray();
          } else {
            $user_balance = array();
          }

          if (!empty($user_balance)) {
              $current_balance = $user_balance[0]['balance'];
              $total_balance = (float)$current_balance + (float)$new_amount_to_deposit;
              Balance::where('user_id', '=', $user_id)
                  ->update([
                      'balance' => $total_balance
                  ]);
          } else {
              Balance::create([
                  'user_id' => $user_id,
                  'balance' => $new_amount_to_deposit
              ]);
          }
      }

    }

}
