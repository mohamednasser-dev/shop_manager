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
		Route::resource('users', 'Admin\UsersController');
		Route::get('users/{id}/delete', 'Admin\UsersController@destroy');

<<<<<<< HEAD
		Route::resource('buy', 'Admin\BuyController');
		Route::get('buy/{id}/delete', 'Admin\BuyController@destroy');
=======
		Route::resource('categories', 'Admin\categoryController');
		Route::get('categories/{id}/delete', 'Admin\categoryController@destroy');

		Route::resource('bases', 'Admin\baseController');
		Route::post('editbases', 'Admin\baseController@update');
		Route::get('bases/{id}/delete', 'Admin\baseController@destroy');


		Route::resource('supplier', 'Admin\supllierController');
		Route::post('editsupplier', 'Admin\supllierController@update');
		Route::get('supplier/{id}/delete', 'Admin\supllierController@destroy');
>>>>>>> 66864544c9e2d1c40c10b376ffa4883fa4af7726
	});



