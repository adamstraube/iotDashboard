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

Route::get('/devices', 'DeviceController@index')->name('devices');
Route::get('/devices/list', 'DeviceController@list');
Route::post('/devices/new', 'DeviceController@new');
Route::put('/devices/update/{id}', 'DeviceController@update');
Route::delete('/devices/delete/{id}', 'DeviceController@delete');

Route::get('/device/{id}/data/', ['as' => 'devices.device.data', 'uses' => 'DeviceDataController@index']);
Route::get('/device/{id}/data/list', ['as' => 'devices.device.data.list', 'uses' => 'DeviceDataController@list']);

Route::get('/credentials', 'CredentialsController@index')->name('credentials');
Route::get('/apiAdmin', 'ApiAdminController@index')->name('apiAdmin');
