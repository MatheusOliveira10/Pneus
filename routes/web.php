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

Route::get('/', 'TyreController@create')->name('home');
Route::get('/view', 'TyreController@view')->name('view');
Route::get('/spa', 'TyreController@teste');
Route::get('/show/{id}', 'TyreController@show');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::resource('tyres', 'TyreController')->except('create');
