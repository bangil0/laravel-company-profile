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

Auth::routes();

Route::group(['prefix' => 'backend'], function(){
	Route::get('/', 'Backend\HomeController@index')->name('backend.home')->middleware('auth');

	// Route Menu Page
	Route::group(['prefix' => 'page', 'middleware' => 'auth'], function(){
		Route::get('/', 'Backend\PageController@index')->name('backend.page.index');
		Route::get('/create', 'Backend\PageController@create')->name('backend.page.create');
		Route::post('/store', 'Backend\PageController@store')->name('backend.page.store');
		Route::get('/edit/{id}', 'Backend\PageController@edit')->name('backend.page.edit');
		Route::put('/update/{id}', 'Backend\PageController@update')->name('backend.page.update');
		Route::get('/destroy/{id}', 'Backend\PageController@destroy')->name('backend.page.destroy');
	});

	// Route Menu Post Category
	Route::group(['prefix' => 'category', 'middleware' => 'auth'], function(){
		Route::get('/', 'Backend\PostCategoryController@index')->name('backend.category.index');
		Route::get('/create', 'Backend\PostCategoryController@create')->name('backend.category.create');
		Route::post('/store', 'Backend\PostCategoryController@store')->name('backend.category.store');
		Route::get('/edit/{id}', 'Backend\PostCategoryController@edit')->name('backend.category.edit');
		Route::put('/update/{id}', 'Backend\PostCategoryController@update')->name('backend.category.update');
		Route::get('/destroy/{id}', 'Backend\PostCategoryController@destroy')->name('backend.category.destroy');
	});

	// Route Menu Contact
	Route::group(['prefix' => 'contact', 'middleware' => 'auth'], function(){
		Route::get('/', 'Backend\ContactController@index')->name('backend.contact.index');
		Route::get('/create', 'Backend\ContactController@create')->name('backend.contact.create');
		Route::post('/store', 'Backend\ContactController@store')->name('backend.contact.store');
		Route::get('/edit/{id}', 'Backend\ContactController@edit')->name('backend.contact.edit');
		Route::put('/update/{id}', 'Backend\ContactController@update')->name('backend.contact.update');
		Route::get('/destroy/{id}', 'Backend\ContactController@destroy')->name('backend.contact.destroy');
	});

	// Route Menu Post
	Route::group(['prefix' => 'post', 'middleware' => 'auth'], function(){
		Route::get('/', 'Backend\PostController@index')->name('backend.post.index');
		Route::get('/create', 'Backend\PostController@create')->name('backend.post.create');
		Route::post('/store', 'Backend\PostController@store')->name('backend.post.store');
		Route::get('/edit/{id}', 'Backend\PostController@edit')->name('backend.post.edit');
		Route::put('/update/{id}', 'Backend\PostController@update')->name('backend.post.update');
		Route::get('/destroy/{id}', 'Backend\PostController@destroy')->name('backend.post.destroy');
	});
});
