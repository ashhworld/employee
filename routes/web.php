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


Route::resource('login','Api\LoginController');

Route::get('/', function () {
    return view('login');
});

Route::middleware(['basicAuth'])->group(function () {
    Route::resource('employees','Api\EmployeesController');

    Route::get('/employees/{id}/show','Api\EmployeesController@show');
    Route::post('/employees/store','Api\EmployeesController@store');
    Route::post('/employees/update/{id}','Api\EmployeesController@update');
    Route::get('/employees/destroy/{id}','Api\EmployeesController@destroy');

    Route::post('/employees/update_status/{id}','Api\EmployeesController@update_status');
});


Route::post('/login/validation','Api\LoginController@validateUser');

Route::get('/view','Api\EmployeesController@index');


