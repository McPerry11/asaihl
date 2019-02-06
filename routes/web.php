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

// Index routes
Route::get('/', 'IndexController@index');
Route::get('/register', 'IndexController@register');
Route::post('/register', 'IndexController@register');

// Admin routes
Route::get('/admin', 'AdminController@login')->name('admin'); // named to prepare for redirection in auth:api
Route::group(['prefix' => 'admin'], function () {
  Route::get('/dashboard', 'AdminController@index');
  Route::get('/logs', 'AdminController@logs');
  Route::get('/logout', 'AdminController@logout');
});
