<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PuertaController extends Controller
{
    public function validar(Request $request){
        $nombre = $request->nombre;
        $clave = $request->clave;

        //dd($nombre,$clave);

        $usuario = Usuario::where('nombre',$nombre)->first();
        if($usuario){
            if(Hash::check($clave, $usuario->clave)){
                $usuario->token = Str::random();
                $usuario->save();

                Auth::login($usuario);
                return response()->json(["success"=> $usuario],200);
            }else{
                return response()->json(["errors"=> "clave o usuario no encontrado"],400);
            }
        }else{
            return response()->json(["errors"=> "Usuario o clave no encontrado"],400);
        }
    }

    public function salida(){
        
    }

}