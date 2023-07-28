<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;

class UserController extends Controller
{  
 
    public function getUser(Request $request){
        
        $token = $request->bearerToken();
        $user = $this->validateToken($token); 
        
            return $user ; 
    }
    public static function validateToken($token)
    {
        try{
            $user = User::where('token',$token)->firstOrFail(); 
        }catch(Throwable $th){
            return response()->json(['error'=> 'NO AUTHORIZADO',$th->getMessage()]);
        }
        return  $user ;
    }
    
 
}
