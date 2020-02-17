<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\clinic_admins;
use App\clinics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ApiTokenController;


class Clinic_adminController extends Controller
{
    protected function guard()
    {
        // return Auth::guard('doctors');
    }
   
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function isClinic_admin(Request $request){
        $api_token=$request->api_token;

        $clinic_admin = DB::table('clinic_admins')->where('api_token', $api_token)->first();
        if($clinic_admin){
            return response()->json(['status'=>'true','clinic_admin'=>$clinic_admin]);
        }else{
            return response()->json(['status'=>'false']);
        }
    }
     
    public function addClinic_admin(Request $request)
    {
        $value=DB::table('clinic_admins')->where('username', $request->username)->get();
        if($value->count()==0){
            $clinic_admin=clinic_admins::create([
               'first_name' => $request->first_name,
               'last_name' => $request->last_name,
               'mobile_no' => $request->mobile_no,
               'email' => $request->email,
               'username' => $request->username,
               'password' =>Hash::make($request->password),
               'api_token' => Str::random(50)
            ]);
            return response()->json(['status'=>'success','clinic_admin'=>$clinic_admin],200);
        }else{
            return response()->json(['status'=>'error','message'=>'user already exists'],400);
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

    public function getClinicDetails(Request $request){

        $id=$request->clinic_id;
        $clinic=DB::table('clinics')->where('clinic_id',$request->clinic_id)->first();
        if($clinic){
            return response()->json(['status'=>'success','clinic'=>$clinic],200);
        }
     
    }


    public function showClinic_Admin(Request $request){

        $token = $request->api_token;
        $clinic_admin = DB::table('clinic_admins')->where('api_token', $token)->first();
        return response()->json(['clinic_admins'=>$clinic_admin]);
           
    }
    public function getallclinics(){
        $allclinics =clinics::all();
        return response()->json(['allclinics'=>$allclinics],200);
    }

    public function deleteclinic(Request $request){
        $id =$request->id;
        $clinic = DB::table('clinics')->where('clinic_id',$id);
        if(!$clinic){
         return response()->json(['msg'=>"Clinic is not found"],404);
     }
      $clinic->delete();
     return response()->json(['msg'=>"Clinic is deleted successfully"],201);
    }
}
