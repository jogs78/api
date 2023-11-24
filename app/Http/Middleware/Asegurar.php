<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

class Asegurar {
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        $authorizationHeader = $request->header('Authorization');
        // Realizar la lógica de verificación del token aquí
        // Normalmente, el token estará en el formato "Bearer tu_token_aqui"
        $token = str_replace('Bearer ', '', $authorizationHeader);
        $usuario = Usuario::where('token',$token)->first();
        $ret = "";
        if($usuario){
            Auth::onceUsingId($usuario->id);
            return $next($request);
        }else{
            return response()->json(["errors"=> "Debe autenticar primero $ret" ],401);
        }
    }
}