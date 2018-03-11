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

Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');

Route::get('/', 'PagesController@home');
Route::get('/yoga', 'PagesController@yoga');
Route::get('/yoga/{id}', 'PagesController@findYoga');

Route::get('/post/{id}/edit', 'PostsController@edit');
Route::post('/post/edit/{id}',['as' => 'update.post', 'uses' => 'PostsController@update']);
Route::post('/post/delete/{id}',['as' => 'delete.post', 'uses' => 'PostsController@destroy']);

Route::get('/food', 'PagesController@food');
Route::get('/food/{id}', 'PagesController@findFood');

Route::get('/hobbies', 'PagesController@hobbies');
Route::get('/hobbies/{id}', 'PagesController@findHobbies');

Route::get('/music', 'PagesController@music');
Route::get('/music/{id}', 'PagesController@findMusic');

Route::get('/blog', 'PagesController@blog');

Route::get('/post', 'PostsController@post');
Route::post('/post',['as' => 'submit.post', 'uses' => 'PostsController@submit']);

Route::post('/contact/message',['as' => 'contact.post', 'uses' => 'PostsController@message']);

Route::post('delete/message/{id}', ['as' => 'delete.message', 'uses' => 'PostsController@deleteMessage']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
