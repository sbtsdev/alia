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

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});

//Route::resource('users', 'UserController');
Route::resource('listings', 'ListingController');
Route::resource('stays', 'StayController');
Route::resource('messages', 'MessageController');

Auth::routes();

Route::get('/account', 'AccountController@edit')->name('account');
Route::get('/account/listings', 'AccountController@listings')->name('account.listings');
Route::get('/account/stays', 'AccountController@stays')->name('account.stays');
Route::post('/account', 'AccountController@update');

Route::post('/filter', 'ListingController@filter');

Route::get('/listings/{$listing}/availability/create');
