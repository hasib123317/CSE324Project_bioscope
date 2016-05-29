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


Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', function() {
	return view('home');
});

Route::get('/about', function() {
	return view('about');
});

Route::get('/rate', function() {
	return view('home');
});

Route::get('/login', 'Auth\AuthController@login');

Route::post('/login/check', 'Auth\AuthController@authenticateAttempt');

Route::get('/logout', 'Auth\AuthController@logout');

Route::post('/signup', 'registrationController@signup');

Route::get('/admin-panel', 'adminController@index');

Route::get('/admin-panel/admins', 'adminController@showAdmin');

Route::get('/admin-panel/users', 'adminController@showUser');

Route::get('/admin-panel/halls', 'adminController@showHall');

Route::post('/createHall', 'adminController@createHall');

Route::get('/admin-panel/halls/insertHall', 'adminController@insertHall');

Route::get('/admin-panel/halls/edit/{id}', 'adminController@updateHall');

Route::post('/admin-panel/halls/save/{id}', 'adminController@saveHall');

Route::get('/admin-panel/halls/delete/{id}', 'adminController@deleteHall');

Route::get('/admin-panel/movies', 'adminController@showMovie');

Route::get('/admin-panel/movies/insertMovie', 'adminController@insertMovie');

Route::post('/createMovie', 'adminController@createMovie');

Route::get('/admin-panel/movies/edit/{id}', 'adminController@updateMovie');

Route::post('/admin-panel/movies/save/{id}', 'adminController@saveMovie');

Route::get('/admin-panel/movies/delete/{id}', 'adminController@deleteMovie');

Route::get('/admin-panel/shows', 'adminController@displayShow');

Route::get('/admin-panel/shows/insertShow', 'adminController@insertShow');

Route::get('/admin-profile', 'adminController@profile');

Route::get('/week-schedule', 'scheduleController@nextweek');

Route::get('/admin-panel/{id}', 'adminController@stub');

Route::post('/admin-panel/{id}', 'adminController@stub');