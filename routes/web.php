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

		Route::resource('roles','Admin\roleController');
		Route::get('/roles/edit/{id}', 'Admin\roleController@edit')->name('roles.edit');
		Route::post('/roles/update_permission/{id}', 'Admin\roleController@update')->name('roles.update_permission');
		Route::post('roles/store_permission','Admin\roleController@store_permission')->name('roles.store_permission');
	    Route::get('/roles/destroy/{id}', 'Admin\roleController@destroy')->name('roles.destroy');


		Route::resource('buy', 'Admin\BuyController');
		Route::get('buy/{id}/delete', 'Admin\BuyController@destroy');
		Route::get('buy_bills', 'Admin\BuyController@buy_bills');

		Route::resource('base_bills', 'Admin\baseBillsController');
		// Route::get('base_bills/{id}/delete', 'Admin\baseBillsController@destroy');
		Route::get('select2-autocomplete-ajax', 'Admin\baseBillsController@dataAjax');
		Route::get('select2-autocomplete-ajax-base', 'Admin\baseBillsController@dataAjax_base');
		Route::post('supplier_bill_bases', 'Admin\baseBillsController@store_base_bill');
		Route::get('supplier_bill_bases/{id}/delete', 'Admin\baseBillsController@destroy_bill_base');
		
//supplier Bill Base	
		Route::resource('supplier_Bill_Base', 'Admin\supplierBillBaseController');

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
    //supplier account
		Route::get('supplier/{id}/account', 'Admin\supllierController@account');
		Route::post('supplier_payment', 'Admin\supllierController@payment');
		Route::post('supplier_manula_bill', 'Admin\supllierController@manula_bill');
//cusromers
		Route::resource('customer', 'Admin\customerController');
		Route::post('editcustomer', 'Admin\customerController@update');
		Route::get('customer/{id}/delete', 'Admin\customerController@destroy');
    //Customer Account		
		Route::get('customer/{id}/account', 'Admin\customerController@account');
		Route::post('cust_payment', 'Admin\customerController@payment');
		Route::post('cust_manula_bill', 'Admin\customerController@manula_bill');
//	products Components

        Route::resource('products', 'Admin\productComponentsController');
        Route::get('products/{id}/delete', 'Admin\productComponentsController@destroy');
//        add quantity
        Route::post('addQuantity','Admin\productComponentsController@show');

//out going
        Route::resource('outgoing', 'Admin\OutgoingController');
        Route::get('outgoing/{id}/delete', 'Admin\OutgoingController@destroy');
	});



