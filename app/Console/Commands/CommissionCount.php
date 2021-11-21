<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use App\Models\User;
use App\Models\PositionsClosed;
use App\Models\CurrencyRate;
use App\Models\Commissions;
use Carbon\Carbon;

class CommissionCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CommissionCount';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle() {
        $commission_rate = 0.2;
        $quote = 'BTC';
        $users = User::get()->toArray();
        foreach($users as $user) {
            $user_id = $user['id'];
            if($user_id != '223') {
              //continue;
            }
            echo $user_id."\n";
            if(!empty($user['commission'])) {
              $commission_rate = (float)$user['commission'];
            } else {
              $commission_rate = 0.2;
            }
            $dayStart = Carbon::now()->subDays(6)->format('Y-m-d');
            //echo "\n\n";
            //echo "dayStart: ".$dayStart."<br>";

            for ($x = 0; $x <= 7; $x++) {
                $dayStart = Carbon::parse($dayStart)->subDays(1)->format('Y-m-d');
                echo "dayStart: ".$dayStart."\n";

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
                        /*
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
                        */
                    } else {
                        if($quote == 'USDT') {
                            Commissions::create([
                                'date' => $dayStart,
                                'user_id' => $user_id,
                                'usdt_profit' => $NetProfit,
                                'usdt_rate' => $exchange_rate,
                                'usdt_commission' => $commission,
                                'usdt_commission_usd' => $commission_usd,
                                'total_commission_usd' => $commission_usd,
                                'commission_rate' => $commission_rate,
                                'status' => 'unpaid'
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
                                'total_commission_usd' => $commission_usd,
                                'commission_rate' => $commission_rate,
                                'status' => 'unpaid'
                            ]);
                        }
                    }
                }
            }
        }
    }
}
