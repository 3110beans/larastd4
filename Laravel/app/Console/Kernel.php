<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Person;
use App\Jobs\MyJob;
use App\Console\ScheduleObj;

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
        // $schedule->command('inspire')
        //          ->hourly();

	//execを使うやり方
//	$schedule->exec('./mycmd.sh');

	//commandを使うやり方
//	$schedule->command('queue:work --stop-when-empty');


	//callでクロージャを使うやり方
/*
	$count = Person::all()->count();
	$id = rand(0, $count) + 1;
	$schedule->call(function()use($id){
		$person = Person::find($id);
		MyJob::dispatch($person);
	});
*/
	//__invoke を使ったオブジェクトを引数にする方法
	$count = Person::all()->count();
	$id = rand(0, $count) + 1;
	$obj = new ScheduleObj($id);
	$schedule->call($obj);


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
