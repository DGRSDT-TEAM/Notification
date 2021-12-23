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
Auth::routes();

##### Start NOTIFICATION  #####
Route::group(['prefix' => 'admin', 'namespace' => 'Dashboard', 'middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/', function () {
        return view('dashboard');
    });

    Route::get('/', function () {
        return view('dashboard');
    });

    Route::group(['prefix' => 'notif'], function () {
        Route::get('/', 'NotificationController@index')->name('notif.index');
        Route::get('create', 'NotificationController@create')->name('notif.create');
        Route::post('store', 'NotificationController@store')->name('notif.store');
        Route::post('destroy', 'NotificationController@destroy')->name('notif.destroy');

        Route::post('inscription', 'NotificationController@inscriptionStore')->name('inscription.store');
        Route::post('delete_inscription/{id}', 'NotificationController@inscriptionDelete')->name('inscription.delete');

    });

    Route::group(['prefix' => 'etabs'], function () {
        Route::get('/', 'EtablissemntController@index')->name('etabs.index');
        Route::get('/create', 'EtablissemntController@index')->name('etab.create');

    });

    Route::group(['prefix' => 'entites'], function () {
        Route::get('/', 'EntiteController@index')->name('entites.index');
        Route::get('/create', 'EntiteController@index')->name('entites.create');

    });


    Route::get('getCourse/{id}', function ($id) {
        $course = App\Models\Labo::where('id_etab',$id)->orWhere('id_etab',0)->get();
        return response()->json($course);
    });
});
##### End NOTIFICATION  #####



