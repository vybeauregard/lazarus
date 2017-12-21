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

//Route::group(['middleware' => ['auth']], function () {

    Route::resource('visits', 'VisitController');

    Route::resource('clients', 'ClientController');

    Route::resource('clients.families', 'FamilyController');

    Route::resource('programs', 'ProgramController');

    Route::resource('loans', 'LoanController');

    Route::resource('parishes', 'ParishController');

    Route::resource('counselors', 'CounselorController');

    Route::get('load-family-form/{fam_id}', function($fam_id){
        return view("clients.family", compact('fam_id'));
    });

    Route::get('reports', function(){
        return view("reports.index");
    })->name('reports.index');

//});
