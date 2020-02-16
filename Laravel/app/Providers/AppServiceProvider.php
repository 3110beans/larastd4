<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//use App\MyClasses\MyService;

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

    /*
    	app()->resolving(function($obj, $app){
		if(is_object($obj)){
			echo get_class($obj) . "<br>";
		}else{
			echo $obj . "<br>";
		}
		
	});
	app()->resolving(PowerMyService::class, function($obj, $app){
		$newdata = ["ハンバーグ", "カレーライス","唐揚げ","餃子"];
		$obj->setData($newdata);
		$obj->setId(rend(0, count($newdata)));
	});

	app()->singleton('App\MyClasses\MyServiceInterface', 'App\MyClasses\PowerMyService');


	app()->bind('App\MyClasses\MyServiceInterface', 'App\MyClasses\PowerMyService');

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
