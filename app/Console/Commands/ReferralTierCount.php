<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Balance;
use App\Models\PaymentsHistory;
use Carbon\Carbon;

class ReferralTierCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ReferralTierCount';

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
      $users = User::select('id','referral_level')->get()->toArray();
      foreach($users as $user) {
          $userID = $user['id'];
          $userReferralLevel = $user['referral_level'];

          $invited_active_users = User::where([['invited_by_user_id','=',$userID],['status','=','active']])->count();

          if(empty($userReferralLevel) xor $userReferralLevel == '0') {
              if($invited_active_users >= 3) {
                  echo $userID.": Tier 1\n";
                  $amount_deposit = 20;
                  User::where('id','=',$userID)->update(['referral_level' => '1']);
                  ReferralTierCount::depositBalance($userID, $amount_deposit);
                  $current_date = Carbon::now()->format('Y-m-d')."T".Carbon::now()->format('H:i:s')."Z";
                  PaymentsHistory::create([
                      'date' => $current_date,
                      'user_id' => $userID,
                      'local_currency' => 'USD',
                      'local_amount' => $amount_deposit,
                      'status' => 'referral:tier1'
                  ]);
              }
          }

          if($userReferralLevel == '1') {
              if($invited_active_users >= 5) {
                  echo $userID.": Tier 2\n";
                  User::where('id','=',$userID)->update([
                    'referral_level' => '2',
                    'commission' => '0.15'
                  ]);
              }
          }

          if($userReferralLevel == '2') {
              if($invited_active_users >= 10) {
                  echo $userID.": Tier 3\n";
                  User::where('id','=',$userID)->update([
                    'referral_level' => '3',
                    'commission_partner' => '0.025'
                  ]);
              }
          }

          if($userReferralLevel == '3') {
              if($invited_active_users >= 25) {
                  echo $userID.": Tier 4\n";
                  User::where('id','=',$userID)->update([
                    'referral_level' => '4',
                    'commission_partner' => '0.05'
                  ]);
              }
          }

          if($userReferralLevel == '4') {
              if($invited_active_users >= 50) {
                  echo $userID.": Tier 5\n";
                  User::where('id','=',$userID)->update([
                    'referral_level' => '5',
                    'commission_partner' => '0.1'
                  ]);
              }
          }



          //If current user already made payment => set status "active"
          /*
          $previousPayments = PaymentsHistory::where([['user_id','=',$userID],['status','=','charge:confirmed']])
          ->orWhere([['user_id','=',$userID],['status','=','charge:resolved']])->select('id')->get();
          if(isset($previousPayments[0]->id)) {
            User::where('id','=',$userID)->update(['status' => 'active']);
          }
          */
      }
    }

    public static function depositBalance($user_id, $amount_deposit) {

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
