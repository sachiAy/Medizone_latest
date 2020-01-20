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


class DoctorController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth',['only'=>'getD']);
    }


    public function addDoctor(Request $request)
    {
        $doctor=doctors::create([
            'user_type'=>$request->user_type,
            'username' => $request->username,
           'reg_no' =>$request->reg_no,
           'first_name' => $request->first_name,
           'last_name' => $request->last_name,
           'NIC' => $request->NIC,
           'birthday' => $request->birthday,
           'specialty' => $request->specialty,
           'contact_no' => $request->contact_no,
           'email' => $request->email,
           'password' =>Hash::make($request->password),
           'api_token' => Str::random(50)
        ]);

        return response()->json(['status'=>'success','doctor'=>$doctor],200);
        
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
