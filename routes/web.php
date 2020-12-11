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
	Route::group(['middleware' => ['auth','admin']], function () {
			//  users  routes
		Route::resource('users', 'Admin\UsersController');
		Route::get('users/{id}/delete', 'Admin\UsersController@destroy');

		Route::resource('buy', 'Admin\BuyController');
		Route::get('buy/{id}/delete', 'Admin\BuyController@destroy');
	});



