<?php

use App\Events\UserSignedUp;
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
	//1. Publish event with Redis (laravel redis publishes even)
	/** with redis
		$data = [
			'event' => 'UserSignedUp',
			'data' => [
				'username' => 'John Doe'
			]
		];	
		Redis::Publish('test-channel', json_encode($data));
	**/

	// with laravel
	//Event::fire() => event()
	event(new UserSignedUp(Request::query('name')));

	return view('welcome');
	//2. node.js +  Redis subscribres to the event (node listens for it)
	//3. use socket.io to emit to all clients

});
