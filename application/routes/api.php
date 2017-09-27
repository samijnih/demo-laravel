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

Route::group(['prefix' => 'bands'], function () {
    Route::get('/', 'BandController@index');
    Route::get('/{band}', 'BandController@show');
    Route::post('/', 'BandController@store');
    Route::put('/{band}', 'BandController@update');
    Route::delete('/{band}', 'BandController@destroy');
});
