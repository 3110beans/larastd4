<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('book', 'BookController');


/*
	2020/2/4
*/

use App\Http\Middleware\HelloMiddleware;

//Route::get('/hello', 'HelloController@index')->name('hello');
Route::middleware([HelloMiddleware::class])->group(function(){
		//Route::get('/hello/{id}', 'HelloController@index')->where('id','[0-9]+');
		//Route::get('/hello', 'HelloController@index')->name("hello");
		//Route::get('/hello/{msg}', 'HelloController@other');
	//	Route::get('/hello/{people}', 'HelloController@index');
		//Route::get('/hello/{person}', 'HelloController@index');
		//Route::post('/hello/other', 'HelloController@other');
		//Route::get('/hello', 'HelloController@index');
		//Route::post('/hello', 'HelloController@index');
		//Route::get('/hello', 'HelloController@index')->name("hello");
		//Route::get('/hello/{id}', 'HelloController@index');
		Route::get('/hello', 'HelloController@index')->middleware(App\Http\Middleware\MyMiddleware::class);
		Route::get('/hello/{id}', 'HelloController@index')->middleware(App\Http\Middleware\MyMiddleware::class);
		Route::get('/hello/other', 'HelloController@other');
		});

//名前空間を使ったRouteの指定方法
/*
Route::namespace("Sample")->group(function(){
	Route::get("/sample", "SampleController@index");
	Route::get("/sample/other", "SampleController@other");
});
*/

//名前空間を使用しないRouteの指定方法
	Route::get("/sample", "Sample\SampleController@index");
	Route::get("/sample/other", "Sample\SampleController@other");






