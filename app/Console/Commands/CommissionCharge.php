<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use App\Models\User;
use App\Models\PositionsClosed;
use App\Models\CurrencyRate;
use App\Models\Commissions;
use App\Models\Balance;
use Carbon\Carbon;

class CommissionCharge extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CommissionCharge';

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
    public function handle()
    {
        $commissions = Commissions::where('status','=','unpaid')->get()->toArray();
        print_r($commissions);
        foreach($commissions as $commission) {
          $commission_id = $commission['id'];
          $user_id = $commission['user_id'];
          if($user_id != '223') {
            //continue;
          }
          echo $user_id."\n";
          $total_commission_usd = (float)$commission['total_commission_usd'];

          if(!empty($user_balance = Balance::where('user_id', '=', $user_id)->first())) {
            $user_balance = Balance::where('user_id', '=', $user_id)->get()->toArray();
            $current_balance = $user_balance[0]['balance'];

            $new_balance = (float)$current_balance - (float)$total_commission_usd;

            Balance::where('user_id','=',$user_id)->update(['balance' => $new_balance]);
            Commissions::where('id','=',$commission_id)->update(['status' => 'paid']);

            echo $user_id.": ".$new_balance."\n";
          }



        }
    }
}
