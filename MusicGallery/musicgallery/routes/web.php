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

Route::get('/', 'PagesController@index');
Route::get('/disco', 'PagesController@disco');
Route::get('/rnb', 'PagesController@rnb');
Route::get('/ballads', 'PagesController@ballads');

Route::post('/disco', 'PostController@createDisco');
Route::post('/rnb', 'PostController@createRnb');
Route::post('/ballads', 'PostController@createBallads');
Route::delete('/albums/discoalbum/{id}', 'PostController@destroyDisco');
Route::delete('/albums/rnbalbum/{id}', 'PostController@destroyRnb');
Route::delete('/albums/balladsalbum/{id}', 'PostController@destroyBallad');

Route::get('/albums/discoalbum', 'AlbumController@viewDiscoAlbum');
Route::get('/albums/rnbalbum', 'AlbumController@viewRnbAlbum');
Route::get('/albums/balladsalbum', 'AlbumController@viewBalladsAlbum');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
