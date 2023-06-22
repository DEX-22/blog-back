<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class LoginController extends Controller
{
    public function login(LoginRequest $request){
     
        
        $user = User::where('name',$request->user_name)->first();
    
        
        $passwordIsCorrect = Crypt::decryptString($user->password) == $request->password;
        
        if( $user->id && $passwordIsCorrect){
            $token = $token ?? $user->createToken('token')->plainTextToken;
    
        }
    
        return response()->json(["token"=>$token,"user" => $user],200);
    }
}
