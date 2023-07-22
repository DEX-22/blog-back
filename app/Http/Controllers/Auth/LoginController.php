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
     
        
        try {
            
            $user = User::where('name',$request->user_name)->first();
            $passwordIsCorrect = Crypt::decryptString($user->password) == $request->password;

        } catch (\Throwable $th) {
            return response()->json($user->password,500);
        }

        if( $user->id && $passwordIsCorrect){
            $token = $user->createToken('token')->plainTextToken;
            $user->token = $token;
            $user->save();
        }

        return response()->json(["token"=>$token,"user" => $user, "otro"=>auth()->user()],200);
    }
}
