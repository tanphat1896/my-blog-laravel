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

Route::get('/', 'BlogController@getIndex');
Route::get('/about', 'PageController@getAbout');
Route::get('/contact', 'PageController@getContact');
Route::post('/contact', 'PageController@postContact');

Route::get('/blog/{slug}', 'BlogController@show')->name('blog.show');
Route::get('/search', 'BlogController@search')->name('blog.search');
Route::post('/comments/reply', 'CommentController@storeReply')->name('comments.storeReply');
Route::get('/tags-cloud/{slug}', 'TagController@showFrontEnd')->name('tags.front_end');

Auth::routes();

Route::get('admin-login/{secret}', 'Auth\LoginController@showAdminLoginForm');

Route::group(['middleware' => ['auth', 'level']], function() {
	Route::get('/admin', 'AdminController@index')->name('admin.index');
	Route::resource('/admin/posts', 'PostController');
	Route::resource('/admin/categories', 'CategoryController', ['only' => ['index', 'destroy', 'store', 'show']]);
	Route::resource('/admin/tags', 'TagController');
	Route::resource('/admin/comments', 'CommentController');
	Route::resource('menus', 'MenuController', ['only' => ['index', 'destroy', 'store']]);
});
