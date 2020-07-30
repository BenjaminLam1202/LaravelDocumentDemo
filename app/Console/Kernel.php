<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Jobs\ProcessUser;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
         Commands\UserCommand::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $email = collect([
            'from' => "job", 
             'detai' => "i heard that new job have been added in queue", 
             'thanhk' => "thank for using our service from here and this is after fixed",
        ]); 
        // $schedule->command('user:removeinmin')->everyTwoHours();
        $schedule->command('user:removeinmin')->hourly(2);

        // $schedule->job(new ProcessUser($email))->everyMinute(); 
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
