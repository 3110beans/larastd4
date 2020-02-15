<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\MyClasses\MyService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

	app()->bind('App\MyClasses\MyServiceInterface', 'App\MyClasses\PowerMyService');

/*
	app()->when('App\MyClasses\MyService')
		->needs('$id')
		->give(1);

	app()->singleton('App\MyClasses\MyService', function($app){
		$myservice = new MyService();
		$myservice->setId(0);
		return $myservice;
	});

	app()->bind('App\MyClasses\MyService', function($app){
		$myservice = new MyService();
		$myservice->setId(0);
		return $myservice;
	});
*/
    }
}
