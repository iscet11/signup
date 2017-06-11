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

// Route::get('/', function () {
//     return view('welcome');
// });
//
Route::pattern('id', '[0-9]+');
Route::get('/', 'ActionController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('action', 'ActionController');

Route::group(['prefix' => 'signup'], function () {
//報名
    Route::get('/create/{id}', 'SignupController@create')
        ->name('signup.create');

//我要報名
    Route::post('/', 'signupController@store')->name('signup.store');
});
