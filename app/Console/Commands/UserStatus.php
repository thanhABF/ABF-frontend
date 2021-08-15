<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\PaymentsHistory;
use App\Models\PositionsClosed;

class UserStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'UserStatus';

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
        $users = User::select('id')->get()->toArray();
        foreach($users as $user) {
            $userID = $user['id'];
            /*
            //If current user already made payment => set status "active"
            $previousPayments = PaymentsHistory::where([['user_id','=',$userID],['status','=','charge:confirmed']])
            ->orWhere([['user_id','=',$userID],['status','=','charge:resolved']])->select('id')->get();
            if(isset($previousPayments[0]->id)) {
              User::where('id','=',$userID)->update(['status' => 'active']);
            }
            */
            //If current user already have closed positions => set status "active"
            $previousPositions = PositionsClosed::where('user_id','=',$userID)->select('id')->get();
            if(isset($previousPositions[0]->id)) {
              User::where('id','=',$userID)->update(['status' => 'active']);
              echo $userID."active \n";
            }
            //break;
        }
    }
}
