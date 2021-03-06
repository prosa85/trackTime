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
})->name('root');

Route::get('/logout',function(){
	\Auth::logout();
	return redirect('home');
});

Route::auth();

Route::get('/home', function () {

    return view('welcome');
});
Route::get('/job', function () {

    App\Jobs\notifyUsersWithTotalHours::dispatch();
});

Route::get('/developer', function(){
	return view('about.developer');
});
Route::get('/contact', function(){
	return view('about.contactme');
});
Route::get('get-paid/{company}', 'TimetrackController@getPaidFromCompany');
Route::post('file','addFileController@add');

Route::group(['middleware' => ['web', 'auth']], function () {
	Route::resource('posts', 'PostsController');
	Route::get('allposts', 'PostsController@all');
});
Route::get('timetrack/week/{week}/user/{user}','TimetrackController@weekForUser');
Route::get('timetrack/week/{week}','TimetrackController@reportForWeek');
Route::group(['middleware' => ['web']], function () {
	Route::resource('users', 'userController');
    Route::resource('cuentas', 'CuentasController');
    Route::resource('pagos', 'pagosController');
	Route::resource('bank', 'CuentasController');
	Route::resource('images', 'ImagesController');
	Route::resource('exercises', 'ExercisesController');
	Route::resource('ex_notes', 'Ex_notesController');
	Route::resource('sets', 'SetsController');
	Route::resource('favorites', 'FavoritesController');
	Route::resource('timetrack', 'TimetrackController');
});

Route::get('imageprofile/{image}', ['as' => 'image', function($image = 'User-icon.png')
{
    $path = storage_path().'\\images\\'.$image;

    if (file_exists($path)) {
        return response()->file($path);
    }
}]);

