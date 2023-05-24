<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'PaymentController@index')->name('home');
Route::group([
    'prefix' => 'payment',
    'as' => 'payment.',
    'middleware' => 'has_invoice',
], function (){
    Route::get('process', 'PaymentController@create')->name('process');
    Route::post('pay', 'PaymentController@store')->name('pay');
    Route::delete('decline', 'PaymentController@delete')->name('decline');
});
