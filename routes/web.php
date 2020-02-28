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


Route::group(['middleware' =>[ 'auth', 'role:admin']], function () {

Route::resource('role', 'Role\IndexController');
Route::resource('user', 'User\IndexController');
Route::resource('order', 'Order\IndexController');
});
Route::group(['middleware' => ['auth', 'role:staff']], function () {
		Route::resource('order', 'Order\IndexController');
});

Route::get('/home', 'HomeController@index')->name('home');
