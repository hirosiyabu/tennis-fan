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
Route::get('/bmi','BmiController@index');
Route::post('/bmi','BmiController@calc');

Route::get('/seiza','SeizaController@index');
Route::post('/seiza','SeizaController@calc');

Route::get('/post','PostController@index');

Route::get('/book','BookController@index');