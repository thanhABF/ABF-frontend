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
        //MAKE THE API REQUEST AND GET CURRENCY RATES

        $url = "https://api.binance.com/api/v3/klines?symbol=BTCUSDT&interval=1d&limit=2";
        $ch = curl_init($url);
       
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, True);
        curl_setopt($ch, CURLOPT_URL, $url);
        $result = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($result);
        error_log($result);
        $time_now = time()*1000;
        
        foreach($response as $res) {
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
