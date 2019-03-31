<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('API')
		->group(function () {
            Route::get('socialmedia', 'SocialMediaController@index');
            Route::get('pageabout', 'PageController@about');
            Route::get('pagegallery', 'ItemController@gallery');
            Route::post('contact', 'ContactController@store');
            Route::get('blog', 'PostController@index');
        });
