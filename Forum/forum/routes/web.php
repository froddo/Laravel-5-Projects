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

Route::get('/discuss', function () {
    return view('discuss');
});

Auth::routes();

Route::get('/forum', ['as' => 'forum', 'uses' => 'ForumsController@index']);

Route::get('{provider}/auth',['as' => 'social.auth', 'uses' => 'SocialsController@auth']);
Route::get('/{provider}/redirect', ['as' => 'social.callback', 'uses' => 'SocialsController@auth_callback']);

Route::get('discussion/{slug}', ['as' => 'discussion', 'uses' => 'DiscussionsController@show']);

Route::get('channel/{slug}', ['as' => 'channel', 'uses' => 'ForumsController@channel']);

Route::group(['middleware' => 'auth'], function (){

    Route::resource('channels', 'ChannelsController');

    Route::get('discussion/create/new', ['as' => 'discussions.create', 'uses' => 'DiscussionsController@create']);

    Route::post('discussions/store', ['as' => 'discussions.store', 'uses' => 'DiscussionsController@store']);

    Route::post('/discussion/reply/{id}', ['as' => 'discussion.reply', 'uses' => 'DiscussionsController@reply']);

    Route::get('/reply/like/{id}', ['as' => 'reply.like', 'uses' => 'RepliesController@like']);

    Route::get('/reply/unlike/{id}', ['as' => 'reply.unlike', 'uses' => 'RepliesController@unlike']);

    Route::get('/discussion/watch/{id}', ['as' => 'discussion.watch', 'uses' => 'WatchersController@watch']);

    Route::get('/discussion/unwatch/{id}', ['as' => 'discussion.unwatch', 'uses' => 'WatchersController@unwatch']);

    Route::get('discussion/best/reply/{id}', ['as' => 'discussion.best.answer', 'uses' => 'RepliesController@best_answer']);

    Route::get('discussion/edit/{slug}', ['as' => 'discussion.edit','uses' => 'DiscussionsController@edit']);

    Route::post('discussion/update/{id}', ['as' => 'discussion.update', 'uses' => 'DiscussionsController@update']);

    Route::get('reply/edit/{id}', ['as' => 'reply.edit', 'uses' => 'RepliesController@edit']);

    Route::post('reply/update/{id}', ['as' => 'reply.update', 'uses' => 'RepliesController@update']);

    Route::delete('reply/delete/{id}', ['as' => 'reply.delete', 'uses' => 'RepliesController@destroy']);

    Route::post('discussion/search', ['as' => 'discussion.search', 'uses' => 'DiscussionsController@search']);
});