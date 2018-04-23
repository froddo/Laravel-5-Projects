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

Route::get('/', ['as' => 'index', 'uses' => 'FrontEndController@index']);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('post', 'PostController');
Route::resource('category', 'CategoriesController');
Route::resource('tag', 'TagsController');
Route::resource('user', 'UsersController');
Route::resource('profile', 'ProfilesController');

Route::get('/posts/trashed', ['as' => 'posts.trashed', 'uses' => 'PostController@trashed']);
Route::get('/posts/restore/{id}', ['as' => 'posts.restore', 'uses' => 'PostController@restore']);

Route::delete('/posts/kill/{id}', ['as' => 'posts.kill', 'uses' => 'PostController@kill']);


Route::get('/users/admin/{id}', ['as' => 'users.admin', 'uses' => 'UsersController@admin']);
Route::get('/users/not-admin/{id}', ['as' => 'users-not.admin', 'uses' => 'UsersController@not_admin']);

Route::get('/settings', ['as' => 'settings', 'uses' => 'SettingsController@index']);

Route::post('/settings/update', ['as' => 'settings.update', 'uses' => 'SettingsController@update']);
Route::get('/{slug}', ['as' => 'post.single' ,'uses' => 'FrontEndController@singlePost']);
Route::get('/Category/{id}', ['as' => 'category.single','uses' => 'FrontEndController@category']);
Route::get('tags/{id}', ['as' => 'tag.single', 'uses' => 'FrontEndController@tag']);
Route::post('/results', ['as' => 'results.gets', 'uses' => 'FrontEndController@results']);

Route::post('/subscribe', function (){
    $email = request('email');

    Newsletter::subscribe($email);

    Session::flash('success', 'Successfully subscribed.');
    return redirect()->back();
});









