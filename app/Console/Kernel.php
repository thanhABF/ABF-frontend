<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('GetCurrencyRate')->hourlyAt(10); //Run the task every hour at 10 minutes past the hour
        //$schedule->command('CommissionCount')->dailyAt('12:00'); //Run the task daily at 1:00 & 13:00
        $schedule->command('UserStatus')->twiceDaily(2, 14); //Run the task daily at 2:00 & 14:00
        //$schedule->command('CommissionCharge')->weeklyOn(5, '13:00'); //Run the task daily at Friday at 13:00
        $schedule->command('ReferralTierCount')->dailyAt('14:00'); //Run the task daily at 3:00 & 15:00
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
