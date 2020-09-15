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

Route::get('/', 'PagesController@index')->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/hustlancers', 'PagesController@hustlancers')->name('hustlancers');
Route::get('/tasks', 'PagesController@tasks')->name('tasks');
Route::get('/featuredjobs', 'PagesController@featuredjobs')->name('featuredjobs');
Route::get('/singlefeaturedjob', 'PagesController@singlefeaturedjob')->name('singlefeaturedjob');
Route::get('/my-account', 'UsersController@index')->name('my-account');
Route::get('/messages', 'GeneralController@message')->name('message');
Route::get('/newtask', 'TaskController@index');
Route::get('/managetasks', 'TaskController@managetasks');
Route::get('/tasks/{slug}', 'TaskController@show');
Route::get('/hustlancers/{name}', 'PagesController@singlehustlancer');
Route::get('/trial', 'UsersController@trial')->name('trial');
Route::get('/mybids', 'BidController@index');
Route::get('/bookmarks', 'BookmarkController@index');
Route::get('/reviews', 'ReviewController@index');
Route::get('/transactions', 'ReviewController@transactions');
Route::get('/myjobs', 'JobController@index');
Route::get('/newjoblisting', 'JobController@create');
Route::get('/payment', 'PaymentController@index');
Route::get('/status', 'PaymentController@status')->name('status');
Route::post('/payment/add-funds/paypal', 'PaymentController@payWithpaypal');
Route::get('/payout', 'PaymentController@payout');





