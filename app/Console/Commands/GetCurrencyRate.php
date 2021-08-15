<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\CurrencyRate;

class GetCurrencyRate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'GetCurrencyRate';

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
        //API SETTINGS
        $key = "6DlWWKt0SkBsGjsJtfwfFbbRsVrrPh7fEToVZlJ2Oc7E21A15fkBteZCxJZvt7lH";
        $secret = "wuEKwrxbj3tDv56QVwFgovegR0KnZXOzmnNvkpYOepELssPLH5CGc7b5vd3oQN7n";

        //MAKE THE API REQUEST AND GET CURRENCY RATES
        $s_time = "timestamp=".time()*1000;
        $sign=hash_hmac('SHA256', $s_time, $secret);
        $url = "https://api.binance.com/api/v3/klines?symbol=BTCUSDT&interval=1d&limit=2";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-MBX-APIKEY:'.$key));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        $result = curl_exec($ch);
        $result = json_decode($result, true);

        $time_now = time()*1000;
        foreach($result as $res) {
            $open_time = $res[0];
            $open = $res[1];
            $high = $res[2];
            $low = $res[3];
            $close = $res[4];
            $volume = $res[5];
            $close_time = $res[6];

            //IF CURRENT DAY IS NOT FINISHED => SKIP THIS VALUE
            $time_difference = $time_now-$close_time;
            if($time_difference > 0) {
                //Convert timestamps to date
                $open_time = substr($open_time,0,-3);
                $open_date = date('Y-m-d',$open_time);

                $close_time = substr($close_time,0,-3);
                $close_date = date('Y-m-d',$close_time);

                $tmp = CurrencyRate::where([['OpenDate','=',$open_date],['CloseDate','=',$close_date]])->first();
                if(!empty($tmp)) {
                    CurrencyRate::where([['OpenDate','=',$open_date],['CloseDate','=',$close_date]])->update([
                      'btc_open' => $open,
                      'btc_high' => $high,
                      'btc_low' => $low,
                      'btc_close' => $close
                    ]);
                } else {
                    CurrencyRate::create([
                        'OpenDateTimestamp' => $open_time,
                        'OpenDate' => $open_date,
                        'CloseDateTimestamp' => $close_time,
                        'CloseDate' => $close_date,
                        'btc_open' => $open,
                        'btc_high' => $high,
                        'btc_low' => $low,
                        'btc_close' => $close
                    ]);
                }


            }

        }
    }
}
