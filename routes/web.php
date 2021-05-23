<?php

use Illuminate\Support\Facades\Route;

// all type of users have appelety to view all this routes ..

//landing page
Route::get('/', 'front\landingController@index');
Route::get('our-products', 'front\landingController@create');
Route::get('contact-us', 'front\landingController@store');
Route::post('send', 'front\landingController@update');


// this route for login and register
Auth::routes();
Route::get('forgot', 'ForgotPasswordController@forgot');
Route::post('reset', 'ForgotPasswordController@reset');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/login_user', 'Admin\LoginController@login')->name('login_user');

Route::group(['middleware' => ['auth', 'admin']], function () {
    //users  routes
    Route::resource('users', 'Admin\usersController');
    Route::get('users/{id}/delete', 'Admin\usersController@destroy');
    Route::post('users/actived', 'Admin\usersController@update_Actived')->name('users.actived');

    //user permissions and roles
    Route::resource('roles', 'Admin\roleController');
//    Route::get('/store_permission', 'Admin\roleController@store_permission')->name('store_permission');
    Route::get('/roles/edit/{id}', 'Admin\roleController@edit')->name('roles.edit');
    Route::post('/roles/update_permission/{id}', 'Admin\roleController@update')->name('roles.update_permission');
    Route::post('roles/store_permission', 'Admin\roleController@store_permission')->name('roles.store_permission');
    Route::get('/roles/destroy/{id}', 'Admin\roleController@destroy')->name('roles.destroy');

    //buy page part and gomla and back products
    Route::get('buy/{part}', 'Admin\BuyController@show')->middleware(['permission:buy part']);
    Route::get('buy/{gomla}', 'Admin\BuyController@show')->middleware(['permission:buy gomla']);
    Route::get('buy/{back}', 'Admin\BuyController@show')->middleware(['permission:buy back']);
    Route::resource('buy', 'Admin\BuyController');
    Route::post('select_products', 'Admin\BuyController@select_products');
    Route::post('bill_products/{bill_id}/destroy_all', 'Admin\BuyController@destroy_all');
    Route::post('cust_bills', 'Admin\BuyController@store_cust_bill');
    Route::get('/live_search/products', 'Admin\BuyController@live_search')->name('live_search.products');
    Route::get('{id?}/ajaxdata/get_bill_product_data', 'Admin\BuyController@get_bill_product_data')->name('ajaxdata.get_bill_product_data');
    Route::get('buy/{id}/delete', 'Admin\BuyController@destroy');
    Route::post('buy_bill_design/{bill_id}/print', 'Admin\BuyController@bill_design');
    Route::get('buy_bill_design_last/{bill_id}/print', 'Admin\BuyController@bill_design_last');

    //buy bills
    Route::resource('buy-bills', 'Admin\buyBillsController');
    Route::get('buy-bills/{bill_id}/print', 'Admin\buyBillsController@print_bill');

    //base bills
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
    Route::get('inbox', 'Admin\categoryController@inbox');

    //bases
    Route::resource('bases', 'Admin\baseController');
    Route::post('editbases', 'Admin\baseController@update');
    Route::get('bases/{id}/delete', 'Admin\baseController@destroy');

    //suppliers
    Route::resource('supplier', 'Admin\supllierController');
    Route::post('editsupplier', 'Admin\supllierController@update');
    Route::post('supplier/actived', 'Admin\supllierController@update_Actived')->name('supplier.actived');
    Route::get('supplier/{id}/delete', 'Admin\supllierController@destroy');
    //supplier account
    Route::get('supplier/{id}/account', 'Admin\supllierController@account');
    Route::get('supplier/{id}/show_bill', 'Admin\supllierController@show_bill');
    Route::post('supplier_payment', 'Admin\supllierController@payment');
    Route::get('supplier_payment/{id}/delete', 'Admin\supllierController@destroy_payment');
    Route::post('supplier_manula_bill', 'Admin\supllierController@manula_bill');
    //cusromers
    Route::resource('customer', 'Admin\customerController');
    Route::post('editcustomer', 'Admin\customerController@update');
    Route::post('customer/actived', 'Admin\customerController@update_Actived')->name('customer.actived');
    Route::get('customer/{id}/delete', 'Admin\customerController@destroy');
    //Customer Account
    Route::get('customer/{id}/account', 'Admin\customerController@account');
    Route::post('cust_payment', 'Admin\customerController@payment');
    Route::post('cust_manula_bill', 'Admin\customerController@manula_bill');
    Route::get('customer_payment/{id}/delete', 'Admin\customerController@destroy_payment');
    //	products Components

    Route::resource('products', 'Admin\productComponentsController');
    Route::get('products/{id}/delete', 'Admin\productComponentsController@destroy');
    //add quantity
    Route::post('addQuantity', 'Admin\productComponentsController@show');

    //out going
    Route::resource('outgoing', 'Admin\OutgoingController');
    Route::get('outgoing/{id}/delete', 'Admin\OutgoingController@destroy');

    //income pages Routes
    Route::resource('income', 'Admin\IncomeController');
    Route::post('income_search', 'Admin\IncomeController@search');

    //income pages Routes
    Route::resource('finatial_year', 'Admin\CloseYearController');

    //account list
    Route::resource('accounts', 'Admin\AccountListController');
    //order list
    Route::resource('orders', 'Admin\OrdersController');
});

Route::get('/customer_login', 'front\landingController@show_login');
Route::post('/customer/login', 'front\landingController@login');
Route::group(['middleware' => ['customer']], function () {
    Route::get('customer_home', 'front\CustomerHomeController@my_orders');
    Route::post('order', 'front\CustomerHomeController@store');
    Route::get('customer_logout', 'front\CustomerHomeController@logout');
});



