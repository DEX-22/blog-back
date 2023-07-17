<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class Registercontroller extends Controller
{
    
    public function register(RegisterRequest $request){
        
        try {
            
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Crypt::encryptString($request->password);
            $user->save();

            return response()->json('USER CREATED SUCCESSFULLY',201);

        } catch (\Throwable $th) {
            return response()->json($th->getMessage(),500);
        }

    }
}
