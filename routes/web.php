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

Route::get('etudiants', function () {
    return view('app.etudiant');
});

Route::get('/test', function () {
    return view('layouts.default');
});

Route::group(['prefix' => 'cosmos'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('PageInscription', function () {
    return view('app/inscription');
})->name('inscription');


Route::group(['middleware'=>'auth'],function (){
    Route::get('credits','CreditController@showCreditsPage')->name('credits');

    Route::group(['prefix'=>'ajax'],function(){
        Route::group(['prefix'=>'credit'],function(){
            Route::get('load_datas','CreditController@loadDatas');
            Route::post('add_credit','CreditController@addCredit');

        });
        Route::get('inscription', 'InscriptionController@index');
    });
});

