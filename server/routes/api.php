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
Route::get('/isClinic_admin','Clinic_adminController@isClinic_admin');
Route::get('/getClinicDetails/{clinic_id}','Clinic_adminController@getClinicDetails');
Route::get('/getAllPatients/{ca_id}','Clinic_adminController@getAllPatients');
Route::get('/getCl_Details','Clinic_adminController@getAllPatients');
Route::get('/getallclinics','Clinic_adminController@getallclinics');

//Appointment Api
Route::post('/getAppointment','Api\AuthController@postAppointments');
Route::post('/addAppointment','AppointmentController@addAppointment');
Route::get('/getAppDetails/{sid}','AppointmentController@getAppDetails');
Route::get('/viewAppointmentDetails/{a_id}','AppointmentController@viewAppointmentDetails');
Route::get('/viewDoctorAppointmentDetails/{dr_id}','AppointmentController@viewDoctorAppointmentDetails');


//Auth controller
Route::post('/login','AuthController@login')->name('login');
Route::get('/getUser','AuthController@getUser');
Route::get('/logout','AuthController@logout');
Route::post('/SubmitDetails','AuthController@SubmitDetails');
Route::post('/getRatings','AuthController@getRatings');


//Doctor
Route::post('/DoctorRegister','DoctorController@addDoctor');
Route::get('/getDoctors/{specialty}','DoctorController@getDoctor');
Route::get('/showDoctor/{api_token}','DoctorController@showD');

Route::get('/getDoctorID/{api_token}','DoctorController@getID');
Route::get('/showPatient/{api_token}','PatientController@showP');
Route::get('/showclinics/{id}','ScheduleController@getclinic');

Route::get('/viewDoctorDetails/{id}','DoctorController@viewDoctorDetails');
Route::get('/isDoctor','DoctorController@isDoctor');


// Route::post('/getDoctors','AuthController@getD');
//Route::middleware('auth:doctors')->get('/getDoctors',['DoctorController@getDoctor']);

//Patient Api
Route::get('/showPatient/{api_token}','PatientController@showP');
Route::post('/PatientRegister','PatientController@addPatient');
Route::get('/isPatient','PatientController@isPatient');

Route::post('/add','DoctorController@add');

//shedule Api
Route::post('/postshedule','ScheduleController@addshedule');
Route::get('/scheduleDetails/{id}','ScheduleController@scheduleDetails');
Route::get('/ratings/{id}','ScheduleController@ratings');

Route::get('/getallclinics','Clinic_adminController@getallclinics');
Route::delete('/deleteclinic/{id}','Clinic_adminController@deleteclinic');

Route::get('/getallDoc','DoctorController@getallDoc');
Route::delete('/deletedoctor/{id}','DoctorController@deletedoctor');
Route::put('/editdoctor/{id}','DoctorController@editdoctor');








