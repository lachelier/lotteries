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
Route::prefix('api')->group(function () {
    Route::get('/lot/{uname}/count', 'LotController@getCount');
    Route::post('/lot/{uname}/add', 'LotController@add');
});

