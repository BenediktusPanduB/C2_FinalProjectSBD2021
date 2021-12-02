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

Route::get('/login','authController@login')->name('login');
Route::post('/loginError', 'authController@loginError');
Route::post('/postlogin', 'authController@postlogin');
Route::get('/logout','authController@logout');


Route::group(['middleware' => 'auth'],function(){
    Route::get('/dashboard','dashboardController@index');
    Route::get('/admin','adminController@index');
    Route::post('/admin/create','adminController@create');
    Route::post('/admin/update{id}','adminController@update');
    Route::get('/admin/{id}/delete','adminController@delete');

    Route::get('/petugas','petugasController@index');
    Route::post('/petugas/create','petugasController@create');
    Route::post('/petugas/update{id}','petugasController@update');
    Route::get('/petugas/{id}/delete','petugasController@delete');

    Route::get('/kartu','kartuController@index');
    Route::post('/kartu/create','kartuController@create');
    Route::post('/kartu/update{id}','kartuController@update');
    Route::get('/kartu/{id}/delete','kartuController@delete');

    Route::get('/parkir/masuk','parkirMasukController@index');
    Route::post('/parkir/masuk/create','parkirMasukController@create');
    Route::post('/parkir/masuk/update{id}','parkirMasukController@update');
    Route::get('/parkir/masuk/{id}/delete','parkirMasukController@delete');

    Route::get('/parkir/keluar','parkirKeluarController@index');
    Route::post('/parkir/keluar/create','parkirKeluarController@create');
    Route::post('/parkir/keluar/update{id}','parkirKeluarController@update');
    Route::get('/parkir/keluar/{id}/delete','parkirKeluarController@delete');

});
Route::get('/dashboard/member','dashboardController@indexMember');



