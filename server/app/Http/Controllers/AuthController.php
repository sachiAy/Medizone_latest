<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\doctors;
use App\patients;
use App\main_admins;
use App\clinic_admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ApiTokenController;


class AuthController extends Controller
{
   
    public function __construct()
    {
       
    }

    public function SubmitDetails(Request $request){
        $doctor=  DB::table('doctors')->where('username', $request->doctor)->first(); 
    
        if($doctor){
            $result=DB::select('select * from doctors where username=:username',['username'=>$request->doctor]);
        return response()->json(['message'=>$result],200);

        }else{
            $result=DB::select('select * from doctors where specialty=:specialty order by dr_id',['specialty'=>$request->specialty]);             

        return response()->json(["doctors"=>$result],200);
        }

    }
    public function getRatings(Request $request){
        $dr_id=$request->dr_id;
        $rating=DB::select('select * from rates where dr_id=:id order by rate_no',['dr_id'=>$request->dr_id]);
        return response()->json(["doctors"=>$rating],200);
    }


    public function login(Request $request)
    {
        $doctor=  DB::table('doctors')->where('reg_no', $request->reg_no)->first(); 
        $patient = DB::table('patients')->where('email', $request->email)->first();
        $main_admin = DB::table('main_admins')->where('username', $request->username)->first();
        $clinic_admin = DB::table('clinic_admins')->where('username', $request->username)->first();

        if(!$doctor && !$patient && !$main_admin && !$clinic_admin){
            return response()->json(['status'=>'error','message'=>'User not found'],404);
        }

        if($doctor){
            if(Hash::check($request->password, $doctor->password)){
          
                return response()->json(['status'=>'success','doctor'=>$doctor],200);
    
            }
        }else if($patient){
            if(Hash::check($request->password, $patient->password)){

                return response()->json(['status'=>'success','patient'=>$patient],200);
            }
        }else if($main_admin){
            if(Hash::check($request->password, $main_admin->password)){

                return response()->json(['status'=>'success','main_admin'=>$main_admin],200);
            }

        }else if($clinic_admin){
            if(Hash::check($request->password, $clinic_admin->password)){

                return response()->json(['status'=>'success','clinic_admin'=>$clinic_admin],200);
            }

        }else{
        
            return response()->json(['status'=>'error','message'=>'Invalid credintials'],401);

        }

    }

    public function getUser(Request $request){
        $api_token = $request->api_token;

        $doctor = DB::table('doctors')->where('api_token', $api_token)->first();
        $patient = DB::table('patients')->where('api_token', $api_token)->first();
        $main_admin = DB::table('main_admins')->where('api_token', $api_token)->first();
        $clinic_admin = DB::table('clinic_admins')->where('api_token', $api_token)->first();

        if(!$doctor && !$patient && !$clinic_admin && !$main_admin){
            return response()->json(['status'=>'error','message'=>'Invalid User'],401);
        }
        if($doctor){

            $dDetails=DB::table('doctors')->where('api_token',$doctor->api_token)->first();
            return response()->json(['status'=>'success','user'=>$dDetails],200);
               
        }else if($patient){

            $patient=DB::table('patients')->where('api_token',$patient->api_token)->first();
            return response()->json(['status'=>'success','user'=>$patient],200);


        }else if($main_admin){

            $main_admin=DB::table('main_admins')->where('api_token',$main_admin->api_token)->first();
            return response()->json(['status'=>'success','user'=>$main_admin],200);


        }else if($clinic_admin){
            
            $clinic_admin=DB::table('clinic_admins')->where('api_token',$clinic_admin->api_token)->first();
            return response()->json(['status'=>'success','user'=>$clinic_admin],200);


        }
    }

    public function logout(Request $request)
    {
            $api_token = $request->api_token;

            $doctor = DB::table('doctors')->where('api_token', $api_token)->first();
            $patient = DB::table('patients')->where('api_token', $api_token)->first();
            $main_admin = DB::table('main_admins')->where('api_token', $api_token)->first();
            $clinic_admin = DB::table('clinic_admins')->where('api_token', $api_token)->first();

            if(!$doctor && !$patient && !$clinic_admin && !$main_admin){
                return response()->json(['status'=>'error','message'=>'Not logged in'],401);
            }
            if($doctor){

                $doctor->api_token=null;
                $doctor=DB::table('doctors')->where('api_token',$doctor->api_token)->first();

            }else if($patient){

                $patient->api_token=null;
                $patient=DB::table('patients')->where('api_token',$patient->api_token)->first();

            }else if($main_admin){

                $main_admin->api_token=null;
                $main_admin=DB::table('main_admins')->where('api_token',$main_admin->api_token)->first();

            }else if($clinic_admin){
                
                $clinic_admin->api_token=null;
                $clinic_admin=DB::table('clinic_admins')->where('api_token',$clinic_admin->api_token)->first();

            }
            
                return response()->json(['status'=>'success','message'=>'You are now logged out'],200);

            

    }

    
}
