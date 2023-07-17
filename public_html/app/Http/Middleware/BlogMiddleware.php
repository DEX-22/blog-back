<?php

namespace App\Http\Middleware;

use App\Models\Blog;
use Closure;
use Illuminate\Http\Request;

class BlogMiddleware
{
    /**
     * El método handle es donde escribiremos la lógica principal de nuestro middleware. 
     * Aquí podemos realizar acciones antes de que la solicitud alcance la ruta deseada. 
     * Por ejemplo, podemos verificar si el usuario está autenticado antes de permitir
     * el acceso a una determinada ruta.
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken(); // Recupera el token de autenticación del encabezado de la solicitud

        // Verifica y valida el token según tus reglas de negocio
        if ($token && $this->isValidToken($token)) {
            return $next($request);
        }

        return response()->json(['NO AUTHORIZED'],401);  //$next($request);
    }
    /**
     * El método terminate se ejecuta después de que la respuesta se haya enviado al navegador. 
     * Aquí podemos realizar acciones adicionales, como registrar información de registro o 
     * realizar tareas de limpieza
     *
     */
    public function terminate()
    {

    }
    private function isValidToken($token)
    {
        $blog = Blog::find(1);
        $isValid = $blog->tokens()->find($token);

        return boolval($isValid);
    }

}
