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

Route::get('/', 'TaskController@index');

Route::post('task/store', [
	'as'	=> 'task.store',
	'uses'	=> 'TaskController@store'
]);

Route::post('task/update', [
	'as'	=> 'task.update',
	'uses'	=> 'TaskController@update'
]);

Route::get('task/edit/{id}', 'TaskController@edit');

Route::post('task/delete/{id}', [
	'as' 	=> 'task.delete',
	'uses' 	=> 'TaskController@delete'
]);
