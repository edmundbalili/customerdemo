<?php

use Illuminate\Support\Facades\Route;

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

// For implemeting basic API based routing
$useBasicApi = true;

// If true, this will uses API routing + Vue js
// else, would use Laravel basic crud
if ($useBasicApi) {
    Route::get('/{any}','CustomerController@api')->where('any', '.*');
}
else{
    Route::get('/', 'CustomerController@create')->name('index');
    Route::get('/customers', 'CustomerController@list')->name('list');
    Route::post('/customers', 'CustomerController@store')->name('create');
    Route::get('/customers/{customer}/edit', 'CustomerController@edit')->name('edit');
    Route::put('/customers/{customer}', 'CustomerController@update')->name('update');
    Route::delete('/customers/{customer}', 'CustomerController@destroy')->name('delete');
}
