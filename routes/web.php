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
//     return view('home');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

Route::group([
    'middleware' => 'auth',
    'prefix' => 'app'
], function ($router) {
    Route::get('/home', 'HomeController@index')->name('resources');

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
Route::get('/doctors/user', 'DoctorController@getDoctorsForPatients')->name('usersDoctor');


Route::get('/hospital/parients', 'PatientController@hspitalPatients')->name('hospitalParients');

// Chat
Route::get('/chat/{id}', 'ChatController@start')->name('chat');
Route::get('/contacts', 'ChatController@contacts');
Route::get('/messages', 'ChatController@messages')->name('messages');
Route::get('/conversation/{id}', 'ChatController@getConversation');
Route::post('/conversation/send', 'ChatController@send');
});