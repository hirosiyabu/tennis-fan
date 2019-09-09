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
    return redirect('/post');
});
Route::get('/bmi','BmiController@index');
Route::post('/bmi','BmiController@calc');

Route::get('/seiza','SeizaController@index');
Route::post('/seiza','SeizaController@calc');

// 掲示板機能

Route::get('/post','PostController@index');
Route::post('post/create','PostController@create');
Route::post('post/update','PostController@update');
Route::post('post/delete','PostController@delete');
Route::get('post/edit/{id}','PostController@edit');
Route::get('post/{id}','PostController@detail');

// SNSログイン実装
Route::get('/auth/login/{social}', 'Auth\SocialLiteController@login');
Route::get('/auth/callback/{social}', 'Auth\SocialLiteController@callback');

// コメント投稿
Route::post('comment/create','CommentController@create');


// おすすめ本機能
Route::get('/book','BookController@index');

// ログイン機能
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//2段階認証
Route::get('/complete-registration', 'Auth\RegisterController@completeRegistration');
Route::post('/2fa', function () {
    return redirect(URL()->previous());
})->name('2fa')->middleware('2fa');
