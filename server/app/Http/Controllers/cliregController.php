<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\cliregs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ApiTokenController;

class cliregController extends Controller
{
    //
    protected function guard()
    {
        // return Auth::guard('doctors');
    }
   
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function addNewclireg(Request $request)
    {
        $value=DB::table('cliregs')->where('cli_id', $request->cli_id)->get();
        if($value->count()==0){
            $clireg=cliregs::create([
                //'user_type'=>$request->user_type,
                'name' => $request->name,
               'regnum' =>$request->regnum,
               'email' => $request->email,
               'clinic_address' => $request->clinic_address,
               'contact_no' => $request->contact_no,
               
            
            ]);
            return response()->json(['status'=>'success','clireg'=>$clireg],200);
        }else{
            return response()->json(['status'=>'error','message'=>'Clinic already exists'],400);
        }
    }
}
