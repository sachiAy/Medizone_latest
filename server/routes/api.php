<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//  Route::prefix('v1')->group(function(){
//      Route::post('/login','Api\AuthController@login');
//      Route::post('/register','Api\AuthController@register');
//       Route::group(['middleware' => 'auth:api'], function(){
//         Route::post('getUser','Api\AuthController@getUser');
//       });
//     });

//Admin Api
Route::post('/Main_adminRegister','Main_adminController@addMain_admin');
Route::get('/isAdmin','Main_adminController@isAdmin');
Route::get('/showAdmin/{api_token}','Main_AdminController@showAdmin');


//Clinic Admin Api
Route::get('/showCAdmin/{api_token}','Clinic_adminController@showClinic_Admin');
Route::post('/Clinic_adminRegister','Clinic_adminController@addClinic_Admin');


//Appointment Api
Route::post('/getAppointment','Api\AuthController@postAppointments');
Route::post('/addAppointment','AppointmentController@addAppointment');

//Auth controller
Route::post('/login','AuthController@login')->name('login');
Route::get('/getUser','AuthController@getUser');
Route::get('/logout','AuthController@logout');

//Doctor
Route::post('/DoctorRegister','DoctorController@addDoctor');
Route::get('/getDoctors/{specialty}','DoctorController@getDoctor');
Route::get('/showDoctor/{api_token}','DoctorController@showD');
Route::get('/viewDoctorDetails/{id}','DoctorController@viewDoctorDetails');
// Route::post('/getDoctors','AuthController@getD');
Route::middleware('auth:doctors')->get('/getDoctors',['DoctorController@getDoctor']);

//Patient Api
Route::get('/showPatient/{api_token}','PatientController@showP');
Route::post('/PatientRegister','PatientController@addPatient');
Route::get('/isPatient','PatientController@isPatient');









