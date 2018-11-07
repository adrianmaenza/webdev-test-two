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
Route::post('/user/store', 'UserController@store');
Route::get('/user/{id}/edit', 'UserController@edit');
Route::post('/user/{id}/update', 'UserController@update');
Route::get('/user/{id}/delete', 'UserController@delete');
Route::post('/user/{id}/destroy', 'UserController@destroy');

Route::post('/attribute/store', 'AttributeController@store');
Route::get('/attribute/{id}/edit', 'AttributeController@edit');
Route::post('/attribute/{id}/update', 'AttributeController@update');
Route::get('/attribute/{id}/destroy', 'AttributeController@destroy');
