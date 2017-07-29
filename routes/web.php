<?php

use App\Models\User;

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
Route::resource('users', 'UserController');
Route::resource('listings', 'ListingController');

Auth::routes();

Route::get('/account', 'UserController@account');

/*
Route::get('/account', function() {
  $user = User::find(Auth::id());

  //dd($user);

  return view('pages.user-edit', User::find(Auth::id()));
})->middleware('auth');
*/
