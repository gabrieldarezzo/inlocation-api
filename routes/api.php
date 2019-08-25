<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', function() {
    return 'Route Not Defined';
});

// crud create , read, readAll, update, delete
Route::resource('users', 'UserController');
Route::post('users_next', 'UserController@getNextUsers');
/*
Route::get('users_next', function(){
    return 'aaa';
});
*/

Route::get('/tt', function() {
    return \Carbon\Carbon::now()->toDateTimeString();
});




Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

