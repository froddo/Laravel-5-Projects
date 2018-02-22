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

Route::get('/','PagesController@home');
Route::get('/contact', 'PagesController@contact');
Route::get('/market', 'PagesController@market');
Route::post('market', ['as' =>'photos.market', 'uses' =>  'PagesController@photoSubmit']);
Route::get('market/show', 'PagesController@show');
Route::get('market/show/{id}', 'PagesController@photoshow');
Route::post('/contact',['as' => 'messages.contact', 'uses' => 'PagesController@messages']);
Route::get('/message', 'PagesController@showMessage');



Route::get('payment/{id}', 'PaymentsController@payment');
Route::post('payment/{id}',['as' => 'submit.payment', 'uses' => 'PaymentsController@submitPayment']);
Route::delete('/payments/{id}','PaymentsController@destroy');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
