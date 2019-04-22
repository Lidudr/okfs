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
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/chat', 'ChatController@index')->name('chat');


Route::group([
    'middleware' => 'auth',
    'prefix' => 'admin'
], function ($router) {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

// Resource
Route::get('/resources', 'ResourceController@index')->name('resources');
Route::get('/resource/add', 'ResourceController@create')->name('newResource');
Route::get('/resource/edit/{id}', 'ResourceController@edit')->name('editResource');
Route::post('/store/resource', 'ResourceController@store')->name('storeResource');
Route::post('/resource/update/{id}', 'ResourceController@update')->name('updateResource');
Route::get('/resource/delete/{id}', 'ResourceController@destroy')->name('deleteResource');

// Hospital
Route::get('/hospitals', 'HospitalController@index')->name('hospitals');
Route::get('/hospital/add', 'HospitalController@create')->name('newHospital');
Route::get('/hospital/edit/{id}', 'HospitalController@edit')->name('editHospital');
Route::post('/hospital/add', 'HospitalController@store')->name('storeHospital');
Route::post('/hospital/update/{id}', 'HospitalController@update')->name('updateHospital');
Route::get('/hospital/delete/{id}', 'HospitalController@destroy')->name('deleteHospital');

// Doctor
Route::get('/doctors', 'DoctorController@index')->name('doctors');
Route::get('/doctor/add', 'DoctorController@create')->name('newDoctor');
Route::get('/doctor/edit/{id}', 'DoctorController@edit')->name('editDoctor');
Route::post('/doctor/add', 'DoctorController@store')->name('storeDoctor');
Route::post('/doctor/update/{id}', 'DoctorController@update')->name('updateDoctor');
Route::get('/doctor/delete/{id}', 'DoctorController@destroy')->name('deleteDoctor');
});