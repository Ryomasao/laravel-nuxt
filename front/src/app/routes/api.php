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
//Route::middleware('guest:api')->get('/api/login', 'LoginApiController@redirectToProvider');

Route::get('login', 'Auth\LoginApiController@redirectToProvider');
Route::get('login/callback', 'Auth\LoginApiController@handleProviderCallback');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
