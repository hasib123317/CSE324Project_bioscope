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

Route::get('/', 'homeController@index');

Route::get('/about', function() {
	return view('about');
});

Route::get('/rate', 'ratingController@ratingStart');

Route::post('/rating-done', 'ratingController@ratingFinish');

Route::get('/login', 'Auth\AuthController@login');

Route::post('/login/check', 'Auth\AuthController@authenticateAttempt');

Route::get('/logout', 'Auth\AuthController@logout');

Route::get('/seeProfile', 'homeController@seeProfile');

Route::post('/signup', 'registrationController@signup');

Route::get('/admin-panel', 'adminController@index');

Route::get('/admin-panel/admins', 'adminController@showAdmin');

Route::get('/admin-profile/edit', 'adminController@updateAdmin');

Route::post('/admin-profile/save', 'adminController@saveAdmin');

Route::get('/admin-panel/movies/insertAdmin', 'adminController@insertAdmin');

Route::post('/createAdmin', 'adminController@createAdmin');

Route::get('/admin-panel/users', 'adminController@showUser');

Route::get('/member-profile/edit', 'homeController@updateUser');

Route::post('/member-profile/save', 'homeController@saveUser');

Route::post('/queryUser', 'adminController@queryUser');

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

Route::post('/queryMovie', 'adminController@queryMovie');

Route::post('/queryShow', 'adminController@queryShow');

Route::get('/admin-panel/shows', 'adminController@displayShow');

Route::get('/admin-panel/shows/insertShow', 'adminController@insertShow');

Route::post('/createShow', 'adminController@createShow');

Route::get('/admin-panel/shows/edit/{id}', 'adminController@updateShow');

Route::post('/admin-panel/shows/save/{id}', 'adminController@saveShow');

Route::get('/admin-profile', 'adminController@profile');

Route::get('/admin-panel/bookings', 'adminController@showBooking');

Route::get('/week-schedule', 'scheduleController@nextweek');

Route::get('/admin-panel/{id}', 'adminController@stub');

Route::post('/admin-panel/{id}', 'adminController@stub');

Route::get('/booking/{movie}/{date}/{hall}', 'bookingController@startBookingProcess');

Route::post('/queryBooking', 'adminController@queryBooking');

Route::post('payment', array(
    'as' => 'payment',
    'uses' => 'bookingController@postPayment',
));

// this is after make the payment, PayPal redirect back to your site
Route::get('payment/status', array(
    'as' => 'payment.status',
    'uses' => 'bookingController@getPaymentStatus',
));