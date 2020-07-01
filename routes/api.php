<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::namespace('Api')->group(function () {
    Route::get('/customers', 'CustomerController@index');
    Route::post('/customers', 'CustomerController@store');
    Route::get('/customers/{customer}', 'CustomerController@show');
    Route::put('/customers/{customer}', 'CustomerController@update');
    Route::delete('/customers/{customer}', 'CustomerController@destroy');
});
