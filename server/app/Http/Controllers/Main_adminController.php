<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\main_admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ApiTokenController;


class Main_adminController extends Controller
{
    protected function guard()
    {
        // return Auth::guard('doctors');
    }
   
    public function __construct()
    {
        // $this->middleware('auth');
    }
  


    public function addMain_admin(Request $request)
    {
        $value=DB::table('main_admins')->where('username', $request->username)->get();
        if($value->count()==0){
            $main_admin=main_admins::create([
               'first_name' => $request->first_name,
               'last_name' => $request->last_name,
               'mobile_no' => $request->mobile_no,
               'email' => $request->email,
               'username' => $request->username,
               'password' =>Hash::make($request->password),
               'birthday' => $request->birthday,
               'api_token' => Str::random(50)
            ]);
            return response()->json(['status'=>'success','main_admin'=>$main_admin],200);
        }else{
            return response()->json(['status'=>'error','message'=>'user already exists'],400);
        }
   
        
    }
    public function isAdmin(Request $request){
        $api_token=$request->api_token;

        $main_admin = DB::table('main_admins')->where('api_token', $api_token)->first();
        if($main_admin){
            return response()->json(['status'=>'true']);
        }else{
            return response()->json(['status'=>'false']);
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

    public function showAdmin(Request $request){

        $token = $request->api_token;
        $admin = DB::table('main_admins')->where('api_token', $token)->first();
        return response()->json(['admins'=>$admin]);
           
    }
}
