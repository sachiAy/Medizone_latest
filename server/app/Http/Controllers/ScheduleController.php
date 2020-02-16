<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\schedules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function getclinic(Request $request)
    {   
        
        $value=DB::table('clinics')->where('dr_id', $request->id)->get();
        return response()->json(['clinics'=>$value]);
      
}

public function addshedule(Request $request)
{   

    $shedule=schedules::create([
    'dr_id'=> $request->dr_id,
    'clinic_id' => $request->clinic_id,
    'date' => $request->date,
    'time'=> $request->time
    ]);
    return response()->json(['status'=>'success','schedule'=>$shedule],200);
    
}
    
    public function scheduleDetails(Request $request)
    {
       $id=$request->id;
       $details=DB::table('schedules')->where('dr_id',$request->id)->get();
       return response()->json(['status'=>'success','details'=>$details],200);
    }

   
    
}
