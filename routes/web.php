<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {

    Route::get('visitors', function(){
        return "visitors";
    })->name('visitors');

    Route::get('clients', function(){
        return "clients";
    })->name('clients');

    Route::get('programs', function(){
        return "programs";
    })->name('programs');

    Route::get('loans', function(){
        return "loans";
    })->name('loans');

    Route::get('parishes', function(){
        return "parishes";
    })->name('parishes');

    Route::get('reports', function(){
        return "reports";
    })->name('reports');

});
