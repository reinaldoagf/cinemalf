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
//Aplicando middleware para verificr si el usuario esta autentificado
Route::group(["middleware"=>"manualauth"],function(){
Route::resource('user','UserController');
Route::resource('movie','MovieController');
Route::resource('gender','GenderController');
});


Route::resource('login','LoginController');
Route::get('logout',['as' => 'logout', 'uses' => 'LoginController@logout']);
//Api
Route::get('userjson/{name}','UserController@getUserJson');
Route::get('usersjson/','UserController@getUsersJson');
Route::get('moviejson/{name}','MovieController@getMovieJson');
Route::get('moviesjson/','MovieController@getMoviesJson');
Route::get('genderjson/{name}','GenderController@getGenderJson');
Route::get('gendersjson/','GenderController@getGendersJson');