<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{  

    // public function __construct($token)
    // {
    //     User::setToken($token);
    // }
    public static function getUser(Request $request){
        
        
        return $request->user();
    }
    public static function validateToken($token)
    {
        $isValid = User::where('token',$token)->first();
        // $isValid = $user;

        return boolval($isValid);
    }
    
 
}
