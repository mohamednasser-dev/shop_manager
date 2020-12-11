<?php
	use Illuminate\Support\Facades\Route;
	Route::get('/', function () {
	    return view('auth/login');
	});

	// all type of users have appelety to view all this routes ..
	// this route for login and register
	Auth::routes();
	Route::get('forgot', 'ForgotPasswordController@forgot');
	Route::post('reset', 'ForgotPasswordController@reset');
	Route::get('/home', 'HomeController@index')->name('home');
	Route::group(['middleware' => ['auth']], function () {
			//  users  routes
		Route::resource('users', 'Admin\usersController');
		Route::get('users/{id}/delete', 'Admin\usersController@destroy');

		Route::resource('categories', 'Admin\categoryController');
		Route::get('categories/{id}/delete', 'Admin\categoryController@destroy');
	});



