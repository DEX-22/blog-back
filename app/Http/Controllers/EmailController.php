<?php

namespace App\Http\Controllers;

use App\Mail\Correo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail(Request $request){

        try{

            $to = $request->to;
            $mensaje = $request->mensaje;
            $correo = new Correo($mensaje);
            Mail::to($to)->send($correo);


        }catch(\Throwable $th){

            return response()->json(['message' => $th->getMessage()],500);

        }

        
        return response()->json(['message' => 'El correo se envió con éxito']);

    }
}
