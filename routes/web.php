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
/*
Route::get('/', function () {
    return view('welcome');
});*/
//Controlador restfull
Route::resource('movie','MovieController');

Route::get('/','FrontController@index');
Route::get('contact','FrontController@contact');
Route::get('review','FrontController@review');
Route::get('admin','FrontController@admin');

Route::resource('user','UserController');
Route::resource('movie','MovieController');
//Api
Route::get('userjson/{name}','UserController@getUserJson');