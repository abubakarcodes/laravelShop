<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();


// Route::group(['prefix' => 'client', 'middleware' => ['web', 'client']], function() {
//     Route::get ('/', 'ClientController@index');
// });

Route::group(['prefix' => 'admin','as' => 'admin.' ,'middleware' => ['auth', 'admin']], function() {
    //DashBoard Route
	Route::get('/dashboard' , 'DashboardController@index')->name('dashboard');
	//categories Route
    Route::resource('categories' , 'CategoryController');

//Products route
Route::resource('products' , 'ProductsController');

//orders route
Route::get('orders' , 'OrdersController@index')->name('orders');
Route::get('/orders/details' , 'OrdersController@show')->name('details');

//order status routes
Route::get('/orders/pending/{id}' , 'OrdersController@pending')->name('order.pending');
Route::get('/orders/confirm/{id}' , 'OrdersController@confirm')->name('order.confirm');

//show order details 
Route::get('/orders/details/{id}' , 'OrdersController@show')->name('order.details');


//users 
Route::get('/users' , 'UsersController@index')->name('users');

//user details
Route::get('users/details/{id}' , 'UsersController@show')->name('user.details');


});


Route::get('/', 'Front\HomeController@index')->name('home');
Route::get('/home' , 'Front\HomeController@index');
Route::get('profile/{id}' , 'Front\ClientController@show')->name('profile');

