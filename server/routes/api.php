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

//Doctor Api
Route::post('/doctorRegister','Api\AuthController@addDoctor');
Route::post('/doctorLogin','Api\AuthController@loginDoctor');
Route::get('/getDoctors',[
    'uses'=>'Api\AuthController@getDoctor'
]);

//Patient Api
Route::post('/patientRegister','Api\AuthController@addPatient');
Route::post('/patientLogin','Api\AuthController@loginPatient');
Route::get('/getPatients',[
    'uses'=>'Api\AuthController@getPatient'
]);

//Admin Api
Route::post('/adminRegister','Api\AuthController@addAdmin');
Route::post('/adminLogin','Api\AuthController@loginAdmin');

//Appointment Api
Route::post('/getAppointment','Api\AuthController@postAppointments');







