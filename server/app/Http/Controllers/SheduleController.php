<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\shedules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class SheduleController extends Controller
{
    public function getclinic(Request $request)
    {   
        
        $value=DB::table('clinics')->where('dr_id', $request->id)->get();
        return response()->json(['clinics'=>$value]);
      
}
    
    public function update(Request $request, $id)
    {
       
    }

   
    
}
