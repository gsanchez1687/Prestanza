<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use App\Jobs\ProcessSimulation;
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
        //Solo se pueden enviar mensajes entre los lunes y sábados entre las 8:00 am – 9:00 pm.
        $schedule->job(new ProcessSimulation)->mondays()->tuesdays()->wednesdays()->thursdays()->fridays()->saturdays()->dailyAt('08:00')->between('08:00', '21:00');
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
