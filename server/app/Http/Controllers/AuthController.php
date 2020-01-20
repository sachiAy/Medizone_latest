<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\doctors;
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
        $this->middleware('auth',['only'=>'getD']);
    }

    public function login(Request $request)
    {
        $doctor=  DB::table('doctors')->where('reg_no', $request->reg_no)->first(); 

        if(!$doctor){
            return response()->json(['status'=>'error','message'=>'User not found'],404);
        }

        if(Hash::check($request->password, $doctor->password)){

            //$doctor=DB::table('doctors')->where('reg_no',$request->reg_no)->update(['api_token'=>Str::random(50)]);
          
            return response()->json(['status'=>'success','doctor'=>$doctor],200);


        }

        return response()->json(['status'=>'error','message'=>'Invalid credintials'],401);

    }

    public function logout(Request $request)
    {
            $api_token = $request->api_token;

            $doctor = DB::table('doctors')->where('api_token', $api_token)->first();

            if(!$doctor){
                return response()->json(['status'=>'error','message'=>'Not logged in'],401);
            }

            $doctor->api_token=null;

            $doctor=DB::table('doctors')->where('api_token',$doctor->api_token)->first();

            return response()->json(['status'=>'success','message'=>'You are now logged out'],200);

    }

    public function getD(){
        dd(Auth::doctors()->reg_no);
        return response()->json(['doctors'=>doctors::all()]);
    }

    public function showD(Request $request){
        $reg_no = $request->reg_no;

            $doctor = DB::table('doctors')->where('reg_no', $reg_no)->first();

            return response()->json(['doctors'=>$doctor]);

    }
}
