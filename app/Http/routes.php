<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/developer', function(){
	return view('about.developer');
});
Route::get('/contact', function(){
	return view('about.contactme');
});

Route::group(['middleware' => ['web', 'auth']], function () {
	Route::resource('posts', 'PostsController');
	Route::get('allposts', 'PostsController@all');
});

Route::group(['middleware' => ['web']], function () {
	Route::resource('images', 'ImagesController');
	Route::resource('exercises', 'ExercisesController');
	Route::resource('ex_notes', 'Ex_notesController');
	Route::resource('sets', 'SetsController');
	Route::resource('favorites', 'FavoritesController');
});

Route::get('imageprofile/{image}', ['as' => 'image', function($image = 'User-icon.png')
{
    $path = storage_path().'\\images\\'.$image;

    if (file_exists($path)) { 
        return response()->file($path);
    }
}]);

