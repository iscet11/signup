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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    $name = 'tad';
    $say  = '嗨！';
    $date = date("Y/m/d");
    return view('welcome', compact('name', 'say', 'date'));
});

Route::get('/action/create', function () {
    return view('create');
})->name('action.create'); //新增活動

//儲存
Route::post('/action', function () {
    return view('welcome')->with('content', '儲存完成');
})->name('action.store');
