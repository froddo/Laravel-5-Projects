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

Route::get('/', 'PublicController@index')->name('index');

Route::get('post/{post}', 'PublicController@singlePost')->name('singlePost');

Route::get('about', 'PublicController@about')->name('about');
Route::get('contact', 'PublicController@contact')->name('contact');
Route::post('message', 'PublicController@contactPost')->name('contactPost');
Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::prefix('user')->group(function (){

    Route::post('new-comment', 'UserController@newComment')->name('newComment');
    Route::get('dashboard', 'UserController@dashboard')->name('userDashboard');
    Route::get('comments', 'UserController@comments')->name('userComments');
    Route::post('comment/{id}/delete', 'UserController@deleteComment')->name('deleteComment');
    Route::get('profile', 'UserController@profile')->name('userProfile');
    Route::post('profile', 'UserController@profilePost')->name('userProfilePost');

});

Route::prefix('author')->group(function (){
    Route::get('dashboard', 'AuthorController@dashboard')->name('authorDashboard');
    Route::get('posts', 'AuthorController@posts')->name('authorPosts');
    Route::get('posts/new', 'AuthorController@newPost')->name('newPost');
    Route::get('comments', 'AuthorController@comments')->name('authorComments');
    Route::get('post/{id}/edit', 'AuthorController@postEdit')->name('postEdit');
    Route::post('post/{id}/update', 'AuthorController@postUpdate')->name('postUpdate');
    Route::post('post/{id}/delete', 'AuthorController@postDelete')->name('postDelete');
    Route::post('post/new', 'AuthorController@createPost')->name('createPost');
});

Route::prefix('admin')->group(function (){
    Route::get('dashboard', 'AdminController@dashboard')->name('adminDashboard');
    Route::get('posts', 'AdminController@posts')->name('adminPosts');
    Route::get('comments', 'AdminController@comments')->name('adminComments');
    Route::get('users', 'AdminController@users')->name('adminUsers');
    Route::get('post/{id}/edit', 'AdminController@postEdit')->name('adminPostEdit');
    Route::post('post/{id}/update', 'AdminController@postUpdate')->name('adminPostUpdate');
    Route::post('post/{id}/delete', 'AdminController@postDelete')->name('adminPostDelete');
    Route::post('comment/{id}/delete', 'AdminController@deleteComment')->name('adminDeleteComment');
    Route::get('user/{id}/edit', 'AdminController@editUser')->name('adminEditUser');
    Route::post('user/{id}/update', 'AdminController@updateUser')->name('adminUpdateUser');
    Route::post('user/{id}/delete', 'AdminController@deleteUser')->name('adminDeleteUser');

    // Message
    Route::get('get-message', 'AdminController@getAllMessage')->name('getMessage');
    Route::post('message/{id}/delete', 'AdminController@deleteMessage')->name('deleteMessage');

    //Shop Admin
    Route::get('products', 'AdminController@adminProducts')->name('adminProducts');

    Route::get('products/new', 'AdminController@newProduct')->name('newProduct');
    Route::post('products-post/new', 'AdminController@newProductPost')->name('newProductPost');

    Route::get('product/edit/{id}', 'AdminController@editProduct')->name('editProduct');
    Route::post('product/{id}', 'AdminController@updateProduct')->name('updateProduct');

    Route::post('product/{id}/delete', 'AdminController@deleteProduct')->name('adminDeleteProduct');
});

Route::prefix('shop')->group(function (){
    Route::get('/', 'ShopController@index')->name('shop.index');
    Route::get('product/{id}', 'ShopController@singleProduct')->name('shop.singleProduct');
    Route::get('product/{id}/order', 'ShopController@orderProduct')->name('shop.orderProduct');
    Route::get('product/{id}/execute', 'ShopController@executeOrder')->name('shop.executeOrder');
});