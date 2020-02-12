<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\appointments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    protected function guard()
    {
        // return Auth::guard('doctors');
    }
   
    public function __construct()
    {
        // $this->middleware('auth');
    }
  
    public function addAppointment(Request $request)
    {   
        
        $value=DB::table('appointments')->where('appointment_id', $request->appointment_id)->get();
        if($value->count()==0){
        $appointment=appointments::create([
        'dr_id'=> $request->dr_id,
        'patient_id' => $request->patient_id,
        'clinic_id' => $request->clinic_id,
        'appointment_date'=> $request->appointment_date,
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'mobile_no' => $request->mobile_no,
        'email'=> $request->email,
        'NIC'=> $request->NIC
        ]);
        
       
        return response()->json(['status'=>'success','appointment'=>$appointment],200);
        }
}
    }