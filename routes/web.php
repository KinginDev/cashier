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
//Site Route
	Route::get('/', 'siteController@showHome');


//Auth Route
	Auth::routes();


//Subscription Route
Route::get('/subscribe','subscribeController@showSubscribe');
Route::post('/subscribe', 'subscribeController@processSubscribe')->name('subscribe');

Route::group(['middleware' => 'auth'], function(){

	//Welcome Page
Route::get('/welcome' , 'subscribeController@showWelcome')->name('welcome')->middleware('subscribed');

	/**

	  *Account routes

	 */

	//Show the Account

	Route::get('/account', 'accountController@showAccount');

	//update Subscription

	Route::post('/account/subscription', 'accountController@updateSubscription')->name('updateSub');

	//update credit card

	Route::post('account/card/update', 'accountController@updateCard')->name('cardUpdate');

	//Download Pdf Invoice

	Route::get('/account/invoices/{invoice}', 'accountController@downloadInvoice')->name('download.invoice');

	//delete subscription

	Route::delete('account/subscription/delete', 'accountController@deleteSubscription')->name('subDelete');


});




//Single Page
Route::get('{slug}', 'siteController@showPost');
//Route::post('/logout-user', 'Auth\LoginController@logout')->name('logout_user');

