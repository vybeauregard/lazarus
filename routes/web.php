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

//Route::get('/home', function () {
//    dd(Auth::user());
//    return redirect('/');
//})->name('home');


Route::group(['middleware' => ['auth', 'verified']], function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('actions', 'ActionController')
        ->except(['update', 'edit', 'show']);

    Route::resource('request-types', 'RequestTypeController')
        ->except(['update', 'edit', 'show']);

    Route::resource('visits', 'VisitController');

    Route::resource('visits.requests', 'RequestController')
        ->except(['index']);

    Route::resource('clients', 'ClientController');

    Route::resource('clients.families', 'FamilyController')
        ->except(['index']);

    Route::resource('clients.income', 'IncomeController')
        ->except(['index']);

    Route::resource('programs', 'ProgramController');

    Route::resource('loans', 'LoanController');

    Route::resource('parishes', 'ParishController');

    Route::match(['PUT', 'PATCH'], 'counselors/toggle-active/{counselor}', 'CounselorController@toggleActive')
        ->name('counselors.toggle-active');
    Route::resource('counselors', 'CounselorController')
        ->except('destroy');

    Route::resource('turn-aways', 'TurnAwayController')
        ->except(['edit', 'update', 'show']);

    Route::get('load-family-form/{fam_id}', function($fam_id){
        return view("clients.family", compact('fam_id'));
    })->name('clients.families.form');

    Route::get('reports', "ReportsController@index")->name('reports.index');
    Route::post('reports', "ReportsController@show")->name('reports.show');

    Route::group(['middleware' => ['admin']], function(){
        Route::resource('users', 'Auth\UserController')
            ->only(['destroy', 'update', 'index']);
        Route::patch('menus', 'Auth\MenuController@update')->name('menus.update');

    });

});
