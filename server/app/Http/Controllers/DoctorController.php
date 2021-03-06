<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\doctors;
use App\selectviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ApiTokenController;


class DoctorController extends Controller
{
    protected function guard()
    {
        // return Auth::guard('doctors');
    }
   
    public function __construct()
    {
        // $this->middleware('auth');
    }

   
 
    public function addDoctor(Request $request)
    {
        $value=DB::table('doctors')->where('reg_no', $request->reg_no)->get();
        if($value->count()==0){
            $doctor=doctors::create([
                //'user_type'=>$request->user_type,
                'username' => $request->username,
               'reg_no' =>$request->reg_no,
               'first_name' => $request->first_name,
               'last_name' => $request->last_name,
               'NIC' => $request->NIC,
               'birthday' => $request->birthday,
               'specialty' => $request->input('specialty'),
               'contact_no' => $request->contact_no,
               'email' => $request->email,
               'password' =>Hash::make($request->password),
               'api_token' => Str::random(50)
            ]);
            return response()->json(['status'=>'success','doctor'=>$doctor],200);
        }else{
            return response()->json(['status'=>'error','message'=>'Doctor already exists'],400);
        }
   
        
    }

    public function isDoctor(Request $request){
        $api_token=$request->api_token;

        $doctor = DB::table('doctors')->where('api_token', $api_token)->first();
        if($doctor){
            return response()->json(['status'=>'true','doctor'=>$doctor]);
        }else{
            return response()->json(['status'=>'false']);
        }
    }

    // public function add(Request $request){
    //     $selectview=selectviews::create([
    //         //'user_type'=>$request->user_type,
    //         'name' => $request->name,
    //     ]);
    //     return response()->json(['message'=>$selectview],201);

   

    // }

    public function getDoctor(Request $request){

        $specialty = $request->specialty;

        $doctor = DB::table('doctors')
                    ->where('specialty', $specialty)
                    ->orderBy('dr_id')
                    ->get();

        return response()->json(['doctors'=>$doctor]);
    }

    public function showD(Request $request){

        $token = $request->api_token;
        $doctor = DB::table('doctors')->where('api_token', $token)->first();
        


        if(!$doctor){
             return response()->json(['status'=>'error','message'=>'unauthorized'], 401);
         }
      
        return response()->json(['doctors'=>$doctor]);

    }


    public function getID(Request $request){

        $token = $request->api_token;
        $doctor = DB::table('doctors')->where('api_token', $token)->first();

        return response()->json(['doctors'=>$doctor]);
    }

    public function viewDoctorDetails(Request $request){
        $id = $request->id;
        $doctor = DB::table('doctors')->where('dr_id', $id)->first();
        return response()->json(['doctors'=>$doctor]);

    

    }
    // public function deletedoctor(Request $request){
    //     $id =$request->id;
    //     $doctor = DB::table('doctors')->where('dr_id',$id);
    //     if(!$doctor){
    //      return response()->json(['msg'=>"Doctorr is not found"],404);
    //  }
    //   $doctor->delete();
    //  return response()->json(['msg'=>"Doctor is deleted successfully"],201);
    // }

    public function deletedoctor($id){
        $Delete = doctors::find($id);
        if($Delete)
            $Delete->delete();
        else
            return response()->json($Delete);
        return response()->json($Delete);
    }

    public function getallDoc(){
        $alldoctors =doctors::all();
        return response()->json(['alldoctors'=>$alldoctors],200);
    }
  
}
