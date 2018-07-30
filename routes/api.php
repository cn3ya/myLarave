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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'curd'],function(){
    Route::get('{model}','CURDController@getList');
    Route::get('{model}/{id}','CURDController@getById');
    Route::post('{model}','CURDController@create');
    Route::put('{model}','CURDController@update');
    Route::delete('{model}','CURDController@delete');
});

Route::group(['prefix'=>'redis'],function(){
    Route::get('string/{model}','RedisController@getString');
    Route::get('hash/{model}','RedisController@getHashAll');
    Route::get('hash/{model}/{id}','RedisController@getHashById');
});

Route::get('test','TestController@test');