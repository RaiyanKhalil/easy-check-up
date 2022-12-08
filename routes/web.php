<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\CustomHomeController@getDefaultData')->name('landing');
Route::get('/home-rsh-60', 'App\Http\Controllers\CustomHomeController@getDefaultData')->name('landing');
Route::get('/home-rsh-60/search', 'App\Http\Controllers\CustomHomeController@search')->name('search');
// Route::get('/search', 'App\Http\Controllers\CustomHomeController@showEmployee')->name('search');



// ROUTES
Auth::routes();

//REGISTRATION
Route::get('/registration-doctor-dku-44/{id}', 'App\Http\Controllers\Auth\RegisterController@showDoctorRegisterPage')->name('register-doctor');
Route::get('/registration-user-dku-44/{id}', 'App\Http\Controllers\Auth\RegisterController@showUserRegisterPage')->name('register-user');

// DASHBOARDS
Route::get('/dashboard-jma-13', 'App\Http\Controllers\DashboardController@patientDash')->name('dashboard-patient');
Route::get('/dashboard-doctor-jma-13', 'App\Http\Controllers\DashboardController@docDash')->name('dashboard-doctor');
Route::get('/user-jma-13/edit/{id}', 'App\Http\Controllers\DashboardController@editUser')->name('user-edit');
Route::post('/user-jma-13/update', 'App\Http\Controllers\DashboardController@updateUser')->name('user-update');

// APPOINTMENTS
Route::post('/appointment-jma-13/create','App\Http\Controllers\AppointmentsController@create')->name('appointment-create');
Route::get('/appointment-jma-13/edit/{id}','App\Http\Controllers\AppointmentsController@edit')->name('appointment-edit');
Route::post('/appointment-jma-13/update/{id}','App\Http\Controllers\AppointmentsController@update')->name('appointment-update');
Route::get('/appointment-jma-13/new/{id}','App\Http\Controllers\AppointmentsController@new')->name('appointment-new');
Route::get('/appointment-jma-13/delete/{id}', 'App\Http\Controllers\AppointmentsController@delete')->name('appointment-delete');
Route::get('/appointment-jma-13/cancel/{id}', 'App\Http\Controllers\AppointmentsController@cancel')->name('appointment-cancel');
Route::get('/appointment-jma-13/approve/{id}', 'App\Http\Controllers\AppointmentsController@approve')->name('appointment-approve');

//DOCTORS
Route::get('/doctor-dku-44/{id}', 'App\Http\Controllers\DoctorController@showDoctor')->name('doctor-edit');
Route::post('/doctor-dku-44/update/{id}', 'App\Http\Controllers\DoctorController@update')->name('doctor-update');
Route::get('/doctor-dku-44/{id}/delete', 'App\Http\Controllers\AppointmentsController@cancel')->name('doctor-cancel');

//LOCATION
Route::get('/location-dku-44', 'App\Http\Controllers\LocationController@getLongLat')->name('location-get');
