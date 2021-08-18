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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('register_user','UsersRegisterController@registerUser')->name('register_user');
Route::get('news','NewsController@index')->name('news');
Route::get('create_new','NewsController@createNew')->name('create_new');
Route::post('store_new','NewsController@storeNew')->name('store_new');
Route::get('news_index','NewsController@newsIndex')->name('news_index');
Route::get('new/{id}','NewsController@getNew');
Route::post('store_comment','CommentsController@storeComment')->name('store_comment');
Route::get('get_comment_info/{id}','CommentsController@get_comments_info');
Route::post('add_answer','AnswersController@add_answers')->name('add_answer');
