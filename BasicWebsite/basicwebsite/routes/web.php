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

Route::get('/', 'PagesController@getHome');
Route::get('/about', 'PagesController@getAbout');
Route::get('/contact', 'PagesController@getContact');

Route::post('/contact/submit', 'MessagesController@submit');
Route::get('/messages/edit/{id}', 'MessagesController@editMessages');
Route::put('/edit/submit/{id}', 'MessagesController@update');
Route::delete('/message/delete/{id}','MessagesController@destroy');

Route::get('/messages', 'MessagesController@getMessages');
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
