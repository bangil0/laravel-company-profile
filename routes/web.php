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

Route::get('{all}', function(){
	return view('home');
})->where('all', '^(?!backend).*$');

Route::group(['prefix' => 'backend'], function(){

    Auth::routes();

	// Route Menu Home
	Route::get('', 'Backend\HomeController@index')->name('backend.home')->middleware('auth');

	// Route Menu Page
	Route::namespace('Backend')
        	->name('backend.page.')
        	->middleware('auth')
        	->prefix('page')
        	->group(function () {
            	Route::get('', 'PageController@index')->name('index');
            	Route::get('create', 'PageController@create')->name('create');
            	Route::post('', 'PageController@store')->name('store');
            	Route::get('{page}/edit', 'PageController@edit')->name('edit');
            	Route::put('{page}', 'PageController@update')->name('update');
            	Route::get('{page}/destroy', 'PageController@destroy')->name('destroy');
        	});

   	// Route Menu Post Category
	Route::namespace('Backend')
        	->name('backend.category.')
        	->middleware('auth')
        	->prefix('category')
        	->group(function () {
            	Route::get('', 'PostCategoryController@index')->name('index');
            	Route::get('create', 'PostCategoryController@create')->name('create');
            	Route::post('', 'PostCategoryController@store')->name('store');
            	Route::get('{category}/edit', 'PostCategoryController@edit')->name('edit');
            	Route::put('{category}', 'PostCategoryController@update')->name('update');
            	Route::get('{category}/destroy', 'PostCategoryController@destroy')->name('destroy');
        	});

    // Route Menu Contact
	Route::namespace('Backend')
        	->name('backend.contact.')
        	->middleware('auth')
        	->prefix('contact')
        	->group(function () {
            	Route::get('', 'ContactController@index')->name('index');
            	Route::get('create', 'ContactController@create')->name('create');
            	Route::post('', 'ContactController@store')->name('store');
            	Route::get('{contact}/edit', 'ContactController@edit')->name('edit');
            	Route::put('{contact}', 'ContactController@update')->name('update');
            	Route::get('{contact}/destroy', 'ContactController@destroy')->name('destroy');
        	});

    // Route Menu Post
	Route::namespace('Backend')
        	->name('backend.post.')
        	->middleware('auth')
        	->prefix('post')
        	->group(function () {
            	Route::get('', 'PostController@index')->name('index');
            	Route::get('create', 'PostController@create')->name('create');
            	Route::post('', 'PostController@store')->name('store');
            	Route::get('{post}/edit', 'PostController@edit')->name('edit');
            	Route::put('{post}', 'PostController@update')->name('update');
            	Route::get('{post}/destroy', 'PostController@destroy')->name('destroy');
        	});

    // Route Menu Social Media
	Route::namespace('Backend')
        	->name('backend.socialmedia.')
        	->middleware('auth')
        	->prefix('socialmedia')
        	->group(function () {
            	Route::get('', 'SocialMediaController@index')->name('index');
            	Route::get('create', 'SocialMediaController@create')->name('create');
            	Route::post('', 'SocialMediaController@store')->name('store');
            	Route::get('{socialmedia}/edit', 'SocialMediaController@edit')->name('edit');
            	Route::put('{socialmedia}', 'SocialMediaController@update')->name('update');
            	Route::get('{socialmedia}/destroy', 'SocialMediaController@destroy')->name('destroy');
        	});

    // Route Menu Item
	Route::namespace('Backend')
        	->name('backend.item.')
        	->middleware('auth')
        	->prefix('item')
        	->group(function () {
            	Route::get('', 'ItemController@index')->name('index');
            	Route::get('create', 'ItemController@create')->name('create');
            	Route::post('', 'ItemController@store')->name('store');
            	Route::get('{item}/edit', 'ItemController@edit')->name('edit');
            	Route::get('{item}/show', 'ItemController@show')->name('show');
            	Route::put('{item}', 'ItemController@update')->name('update');
            	Route::get('{item}/destroy', 'ItemController@destroy')->name('destroy');
        	});

    // Route Menu Item Detail
	Route::namespace('Backend')
        	->name('backend.itemdetail.')
        	->middleware('auth')
        	->prefix('itemdetail')
        	->group(function () {
            	Route::get('', 'ItemDetailController@index')->name('index');
            	Route::get('{item}/create', 'ItemDetailController@create')->name('create');
            	Route::post('{item}', 'ItemDetailController@store')->name('store');
            	Route::get('{itemdetail}/edit', 'ItemDetailController@edit')->name('edit');
            	Route::get('{itemdetail}/show', 'ItemDetailController@show')->name('show');
            	Route::put('{itemdetail}', 'ItemDetailController@update')->name('update');
            	Route::get('{itemdetail}/destroy', 'ItemDetailController@destroy')->name('destroy');
        	});

    // Route Menu Company Profile
    Route::namespace('Backend')
            ->name('backend.profile.')
            ->middleware('auth')
            ->prefix('company-profile')
            ->group(function () {
                Route::get('', 'CompanyProfileController@index')->name('index');
                Route::get('create', 'CompanyProfileController@create')->name('create');
                Route::put('{id}', 'CompanyProfileController@update')->name('update');
            });
});
