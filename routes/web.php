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

Route::get('/', 'PostsController@index')->name('home');

Route::get('posts/show/{slug}', 'PostsController@show');

Route::post('comments/create', 'CommentsController@create');

// Admin routes

Auth::routes();

Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => 'auth'], function(){

	Route::get('admin/dashboard', 'HomeController@index')->name('dashboard');

	//Posts routes
	//Route::resource('admin/posts', 'admin\PostsController');
	Route::get('admin/posts', 'admin\PostsController@index')->name('posts');
	Route::get('admin/posts/create', 'admin\PostsController@create');
	Route::post('admin/posts/insert', 'admin\PostsController@store');
	Route::get('admin/posts/show/{id}', 'admin\PostsController@show');
	Route::get('admin/posts/edit/{id}', 'admin\PostsController@edit');
	Route::post('admin/posts/update/{id}', 'admin\PostsController@update');
	Route::get('admin/posts/delete/{id}', 'admin\PostsController@destroy');

	//Categories routes
	Route::get('admin/categories', 'admin\CategoriesController@index')->name('categories');
	Route::get('admin/categories/create', 'admin\CategoriesController@create');
	Route::post('admin/categories/insert', 'admin\CategoriesController@store');
	Route::get('admin/categories/edit/{id}', 'admin\CategoriesController@edit');
	Route::post('admin/categories/update/{id}', 'admin\CategoriesController@update');
	Route::get('admin/categories/delete/{id}', 'admin\CategoriesController@destroy');

});

