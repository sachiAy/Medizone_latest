<?php

namespace App\Http\Controllers\Api;

use App\doctors;
use App\patients;
use App\admins;
use App\Appointments;
use App\test;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Passport;
use Validator;

class AuthController extends Controller {
  public $successStatus = 200;
  //Doctor Registration
    public function addDoctor(Request $request){
        // $validator = Validator::make($request->all(), [
        //     'username' => 'required',
        //     'reg_no' => 'required',
        //     'first_name' => 'required',
        //     'last_name' => 'required',
        //     'NIC' => 'required',
        //     'birthday' => 'required',
        //     'specialty' => 'required',
        //     'contact_no' => 'required',
        //     'email' => 'required|email|unique:doctors',
        //     'password' => 'required',

        // ]);
         $validatedData = $this->validate(request(), [
           'user_type'=>'doctor',
          'username' => 'required',
           'reg_no' => 'required',
           'first_name' => 'required',
           'last_name' => 'required',
           'NIC' => 'required',
           'birthday' => 'required',
           'specialty' => 'required',
           'contact_no' => 'required',
           'email' => 'required|email|unique:doctors',
           'password' => 'required',

       ]);
         $doctor = doctors::create(request(['user_type','username','reg_no','first_name','last_name','NIC','birthday','specialty','contact_no','email','password']));
        // $accessToken=$doctor->createToken('authToken')->accessToken;
         return response(['message'=>$doctor],200);
    }

  //       if ($validator->fails()) {
  //         return response()->json(['error'=>$validator->errors()], 401);                        }
  //   $input = $request->all();
  //   $input['password'] = bcrypt($input['password']);
  //   $doctor = doctors::create($input);
  //   $success['token'] =  $doctor->createToken('AppName')->accessToken;
  //   return response()->json(['doctor'=>$doctor,'success'=>$success], $this->successStatus);
  //  }



    //login
    // public function login(){
    //   if(Auth::guard('doctors')->check(['reg_no' => request('reg_no'), 'password' => request('password')])){
    //      $doctor = Auth::doctors();
    //      $success['token'] =  $doctor->createToken('AppName')-> accessToken;
    //       return response()->json(['success' => $success], $this-> successStatus);
    //     } else{
    //      return response()->json(['error'=>'Unauthorised'], 401);
    //      }
    //   }

  //Doctor Login
  public function loginDoctor(Request $request) {

    if(Auth::guard('web')->attempt(request(['reg_no','password'])) == false) {

      return response()->json(['message'=>'invalid credentials'],400);
    }

    $doctor = DB::table('doctors')->where('reg_no', request('reg_no'))->get();
    return response()->json($doctor,200);

  }

    //Patient Registration
    public function addPatient(Request $request){
      $this->validate(request(), [
        'customer_type'=>'required',
        'first_name' => 'required',
        'last_name' => 'required',
        'NIC' => 'required',
        'birthday' => 'required',
        'blood_group' => 'required',
        'address' => 'required',
        'contact_no' => 'required',
        'username' => 'required',
        'email' => 'required',
        'password' => 'required',

    ]);

    $patient = patients::create(request(['customer_type','first_name','last_name','NIC','birthday','blood_group','address','contact_no','username','email','password']));

    return response()->json(['message'=>$patient],201);
    }

    //Patient Login
    public function loginPatient(Request $request) {

      if(Auth::guard('patients')->attempt(request(['email','password'])) == false) {

        return response()->json(['message'=>'invalid credentials'],400);
      }

      $patient = DB::table('patients')->where('email', request('email'))->get();
      return response()->json($patient,200);

    }

    //admin register
    public function addAdmin(Request $request){
      $this->validate(request(), [
        'admin_no'=>'required',
        'first_name' => 'required',
        'last_name' => 'required',
        'contact_no' => 'required',
        'username' => 'required',
        'email' => 'required',
        'password' => 'required',

    ]);

    $admin = admins::create(request(['admin_no','first_name','last_name','contact_no','username','email','password']));

    return response()->json(['message'=>$admin],201);
    }

    //Admin Login
    public function loginAdmin(Request $request) {

      if(Auth::guard('admins')->attempt(request(['admin_no','password'])) == false) {
        return response()->json(['message'=>'invalid credentials'],400);
      }

      $admin = DB::table('admins')->where('admin_no', request('admin_no'))->get();
      return response()->json($admin,200);

    }

    //Add appointment
    public function postAppointments(Request $request){
      $this->validate(request(), [
        'name'=>'required',
        'telephone' => 'required',
        'nic' => 'required',
        'email' => 'required',

    ]);

    $appointment = appointments::create(request(['admin_no','first_name','last_name','contact_no','username','email','password']));

    return response()->json(['message'=>$admin],201);

      $appointment = new Appointments();

      $appointment->name = $request->input('name');
      $appointment->telephone = intval($request->input('telephone'));
      $appointment->nic= $request->input('nic');
      $appointment->email= $request->input('email');
      $appointment->save();

      return response()->json(['message'=>$appointment],201);
  }

  //get doctors
  public function getDoctor(){
    $alldoctors =doctors::all();
    return response()->json(['alldoctors'=>$alldoctors],200);
}

//test
  public function register(Request $request){
    $this->validate(request(), [
      
      'username' => 'required',
      'email' => 'required|email',
      'password' => 'required',

  ]);

  $test = test::create(request(['username','email','password']));
  $accessToken=$test->createToken('authToken')->accessToken;
  return response()->json(['message'=>$test, 'token'=>$accessToken],201);
  }


    public function login(){
        if(Auth::guard('web')->attempt(['email'=>request('email'), 'password'=>request('password')])){
            $test=Auth::test();
            // $success['token']=$test->createToken('AppName')->accessToken;
            $accessToken=$test->createToken('authToken')->accessToken;
            return response()->json(['success'=>$accessToken], 200);

        }else{
            return response()->json(['error'=>'unauthorised'], 401);
        }
    }

    public function getUser(){
        $user = Auth::test();
        return response()->json(['success'=>$user], $this->successStatus);
    }

}
