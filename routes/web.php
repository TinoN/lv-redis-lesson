<?php

use Illuminate\Support\Facades\Redis;

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
	//Redis::set('name', 'Tino');
	//return Redis::get('name');
    //return view('welcome');
    //return Redis::hget('preferences', 'length');

    //key foo saved  with a value of bar for 10 min
    Cache::put('foo', 'bar', 10);

    return Cache::get('foo');
});
