<?php

namespace App\Http\Controllers;

use App\people;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Validator;


class PeopleController extends Controller 
{
    public function adduser(Request $request){

        $people= new people();

        $people->uname = $request->input('uname');
        $people->uid = $request->input('uid');
        $people->udep = $request->input('udep');
        $people->ulevel = $request->input('ulevel');
        $people->upassword = $request->input('upassword');

        $people->save();
        
        return response()->json(['message'=>$people],201);

    }


    public function loginpeople(Request $request){

        
        
        if(Auth::guard('web')->attempt(request(['uname','upassword'])) == false){

            return response()->json(['message'=>'invaild'],400);

        }
        
         $people = DB::table('people')->where('uname', request('uname'))->get();

         return response()->json($people);

    }

    //  public function loginpeople(Request $request){
    //      $loginData = $request->validate([
    //          'uname'=>'required',
    //          'upassword'=>'required',
    //      ]);

    //      if(!auth()->attempt($loginData)){
    //          return response(['message'=>'Invalid login']);
    //      }
    //     $accessToken = auth()->people()->createToken('auth token')->accessToken;
    //      return response(['people'=>auth()->people(),'accessToken'=>$accessToken]);
    //  }

   


    // // public function loginpass(Request $request)
    // // {
    // //     $credentials = [
    // //         'uname' => $request->uname,
    // //         'upassword' => $request->upassword
    // //     ];
 
    // //     if (auth()->attempt($credentials)) {
    // //         $token = auth()->people()->createToken('TutsForWeb')->accessToken;
    // //         return response()->json(['token' => $token], 200);
    // //     } else {
    // //         return response()->json(['error' => 'UnAuthorised'], 401);
    // //     }
    // // }


    


    // public function addusertest(Request $request){

    //  $people= new people();

    //  $people->uname = $request->input('uname');
    //  $people->uid = $request->input('uid');
    //  $people->udep = $request->input('udep');
    //  $people->ulevel = $request->input('ulevel');
    //  $people->upassword = $request->input('upassword');

    //  $people->save();
        
    // //  return response()->json(['message'=>$people],201);


    //  $people = people::create(request(['uname','uid','udep','ulevel','upassword']));
    //    $accessToken=$people->createToken('authToken')->accessToken;
    //     return response(['message'=>$people,'token'=>$accessToken]);

    // }

    // public function logintest(Request $request)
    // {
    //     $credentials = [
    //         'uname' => $request->uname,
    //         'upassword' => $request->upassword
    //     ];
 
    //     if (Auth::attempt($credentials)) {
    //      //   $token = auth()->people()->createToken('TutsForWeb')->accessToken;
    //         return response()->json(['token' => 'hai'], 200);
    //     } else {
    //         return response()->json(['error' =>'failed'], 401);
    //     }
    // }


    public function postLogin(Request $request)
    {
        
 
        $credentials = $request->only('uname', 'upassword');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $people = DB::table('people')->where('uname', request('uname'))->get();
            return response()->json(['message'=>$people],201);
        }
        return response()->json(['message'=>'invaild'],400);
    }

}
