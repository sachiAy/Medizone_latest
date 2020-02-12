<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\patients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ApiTokenController;


class PatientController extends Controller
{
    protected function guard()
    {
        // return Auth::guard('doctors');
    }
   
    public function __construct()
    {
        // $this->middleware('auth');
    }
  


    public function addPatient(Request $request)
    {
        $value=DB::table('patients')->where('email', $request->email)->get();
        if($value->count()==0){
            $patient=patients::create([
               'first_name' => $request->first_name,
               'last_name' => $request->last_name,
               'nic' => $request->nic,
               'mobile_no' => $request->mobile_no,
               'email' => $request->email,
               'birthday' => $request->birthday,
               'specialty' => $request->specialty,
               'address' => $request->address,
               'username' => $request->username,
               'password' =>Hash::make($request->password),
               'customer_type'=>$request->customer_type,
               'api_token' => Str::random(50)
            ]);
            return response()->json(['status'=>'success','patient'=>$patient],200);
        }else{
            return response()->json(['status'=>'error','message'=>'Doctor already exists'],400);
        }
   
        
    }

    public function getDoctor(Request $request){

        $specialty = $request->specialty;

        $doctor = DB::table('doctors')
                    ->where('specialty', $specialty)
                    ->orderBy('dr_id')
                    ->get();

        return response()->json(['doctors'=>$doctor]);
    }

    public function showP(Request $request){

        // $credential=$request->only('reg_no','api_token');
        // if(Auth::guard('doctors')->attempt($credential)){
        //     $doctor = DB::table('doctors')->where('reg_no', $reg_no)->first();
        //     return response()->json(['doctors'=>$doctor]);
        // }
        $token = $request->api_token;
        $patient = DB::table('patients')->where('api_token', $token)->first();
        return response()->json(['patients'=>$patient]);

        // if(Auth::doctors()->reg_no !== $request->reg_no){

        //     return response()->json(['status'=>'error','message'=>'unauthorized'],401);

        // }

           

            

    }
}
