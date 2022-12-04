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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', 'App\Http\Controllers\CustomHomeController@getExternalDoctors')->name('landing');

// ROUTES
Auth::routes();

//Registration Routes

Route::get('/registration-doctor/{id}', 'App\Http\Controllers\Auth\RegisterController@showDoctorRegisterPage')->name('register-doctor');
Route::get('/registration-user/{id}', 'App\Http\Controllers\Auth\RegisterController@showUserRegisterPage')->name('register-user');

// APPOINTMENTS
Route::get('/dashboard', 'App\Http\Controllers\DashboardController@patientDash')->name('dashboard-patient');
Route::get('/dashboard-doctor', 'App\Http\Controllers\DashboardController@docDash')->name('dashboard-doctor');
Route::post('/appointment/create','App\Http\Controllers\AppointmentsController@create')->name('appointment-create');
Route::get('/appointment/new/{id}','App\Http\Controllers\AppointmentsController@new')->name('appointment-new');
Route::get('/appointment/delete/{id}', 'App\Http\Controllers\AppointmentsController@delete')->name('appointment-delete');
Route::get('/appointment/cancel/{id}', 'App\Http\Controllers\AppointmentsController@cancel')->name('appointment-cancel');


