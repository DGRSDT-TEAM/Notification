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

Route::get('/', function () {
    return view('dashboard');
});

##### Start NOTIFICATION  #####
Route::group(['prefix' => 'admin', 'namespace' => 'Dashboard'], function () {

    Route::get('/', function () {
        return view('dashboard');
    });

    Route::group(['prefix' => 'notif'], function () {
        Route::get('/', 'NotificationController@index')->name('notif.index');
        Route::get('create', 'NotificationController@create')->name('notif.create');
        Route::post('store', 'NotificationController@store')->name('notif.store');
        Route::post('destroy', 'NotificationController@destroy')->name('notif.destroy');

    });
});
##### End NOTIFICATION  #####
