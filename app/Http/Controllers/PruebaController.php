<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use App\Models\Ruta;

class PruebaController extends Controller
{
    public function politica () {
        $usuario = Usuario::find(1);
        $ruta = Ruta::find(2);

        Auth::onceUsingId($usuario->id);
        $u = auth()->user();
        echo $u->id . "<br>";
        echo $ruta->propietario . "<br>";
            //    $policy = Gate::getPolicyFor(Ruta::class);
        //$policy = Gate::policy(Ruta::class,'lisatrUnidades');
        try{
            $this->authorize('listarUnidades',$ruta);
            $puede = "si";
        } catch (\Throwable $th) {
            $puede = "no";
        }

        echo "puede $puede.";

        \Log::info('Aplicando política listarUnidades para el usuario ' . $usuario->id);
       
    }
}
