<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', 'RequestsController@index');

Route::get('/requests', 'RequestsController@index');
Route::get('/requests/add', 'RequestsController@manage');
Route::get('/requests/edit/{id}', 'RequestsController@manage');
Route::post('/requests/save', 'RequestsController@save');
Route::get('/requests/delete/{id}', 'RequestsController@delete');

// Route::get('/home', 'RequestsController@index');
// Route::get('/dashboard', 'HomeController@index');

Route::get('/user', 'UserController@index');
Route::get('/user/delete/{id}', 'UserController@delete');
//Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
