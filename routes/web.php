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

		Route::resource('buy', 'Admin\BuyController');
		Route::get('buy/{id}/delete', 'Admin\BuyController@destroy');

		Route::resource('base_bills', 'Admin\baseBillsController');
		Route::get('base_bills/{id}/delete', 'Admin\baseBillsController@destroy');
		Route::get('select2-autocomplete-ajax', 'Admin\baseBillsController@dataAjax');
		Route::get('select2-autocomplete-ajax-base', 'Admin\baseBillsController@dataAjax_base');
//categories
		Route::resource('categories', 'Admin\categoryController');
		Route::get('categories/{id}/delete', 'Admin\categoryController@destroy');
//bases
		Route::resource('bases', 'Admin\baseController');
		Route::post('editbases', 'Admin\baseController@update');
		Route::get('bases/{id}/delete', 'Admin\baseController@destroy');

//suppliers
		Route::resource('supplier', 'Admin\supllierController');
		Route::post('editsupplier', 'Admin\supllierController@update');
		Route::get('supplier/{id}/delete', 'Admin\supllierController@destroy');
//cusromers
		Route::resource('customer', 'Admin\customerController');
		Route::post('editcustomer', 'Admin\customerController@update');
		Route::get('customer/{id}/delete', 'Admin\customerController@destroy');
//	products Components

        Route::resource('products', 'Admin\productComponentsController');
        Route::get('products/{id}/delete', 'Admin\productComponentsController@destroy');


	});



