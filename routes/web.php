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

Auth::routes();
Route::get('/', 'HomeController@index');

Route::post('/customers/{customer}/projects/{project}/tasks/{task}/intervals', 'IntervalsController@store');
Route::get('/customers/{customer}/projects/{project}/tasks/{task}/intervals/create', 'IntervalsController@create');
Route::get('/customers/{customer}/projects/{project}/tasks/{task}/intervals/{interval}', 'IntervalsController@show');

Route::post('/customers/{customer}/projects/{project}/tasks', 'TasksController@store');
Route::get('/customers/{customer}/projects/{project}/tasks/create', 'TasksController@create');
Route::get('/customers/{customer}/projects/{project}/tasks/{task}', 'TasksController@show');

Route::post('/customers/{customer}/projects', 'ProjectsController@store');
Route::get('/customers/{customer}/projects/create', 'ProjectsController@create');
Route::get('/customers/{customer}/projects/{project}', 'ProjectsController@show');

Route::get('/customers', 'CustomersController@index');
Route::post('/customers', 'CustomersController@store');
Route::get('/customers/create', 'CustomersController@create');
Route::get('/customers/{customer}', 'CustomersController@show');
