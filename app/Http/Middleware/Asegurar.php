<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Usuario;

use function PHPUnit\Framework\isNull;

class Asegurar {
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $rol=null): Response
    {
        $authorizationHeader = $request->header('Authorization');
        // Realizar la lógica de verificación del token aquí
        // Normalmente, el token estará en el formato "Bearer tu_token_aqui"
        $token = str_replace('Bearer ', '', $authorizationHeader);
        $usuario = Usuario::where('token',$token)->first();
        if($usuario){
            if (is_null($rol)) {
                return $next($request);
            }else{
                if(strpos("|$rol",$usuario->rol)!=false){
                    return $next($request);
                }else{
                    return response()->json(["errors"=> "Token no valido"],403);
                }
            }
        }else{
            return response()->json(["errors"=> "Token no valido" ],401);
        }
    }
}