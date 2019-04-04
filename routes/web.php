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

Route::group(['prefix'=>'test'],function(){
    Route::get('view', function () {
        return view('layouts.default');
    });
    Route::get('test','TestController@makeTest');
});



Route::group(['prefix' => 'cosmos'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware'=>'auth'],function (){
    //Module crédits
    Route::get('credits','CreditController@showCreditsPage')->name('credits');

    //MOdule notes
    Route::get('notes',function(){
        return view('app.notes');
    })->name('notes');


    //Routes ajax
    Route::group(['prefix'=>'ajax'],function(){
        Route::group(['prefix'=>'credit'],function(){
            Route::get('load_datas','CreditController@loadDatas');
            Route::post('add_credit','CreditController@addCredit');
        });
        Route::group(['prefix'=>'notes'],function(){
            Route::get('load_datas','NoteController@loadDatas');
            Route::post('add_note','noteController@addNote');
        });
        Route::post('update_note','NoteController@updateNote');

    });


});

