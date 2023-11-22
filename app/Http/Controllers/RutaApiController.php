<?php

namespace App\Http\Controllers;

use App\Policies\RutaPolicy;
use App\Http\Requests\StoreRutaRequest;
use App\Http\Requests\UpdateRutaRequest;
use App\Models\Ruta;
use Illuminate\Support\Facades\Gate;
class RutaApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return response(Ruta::all(), 200)->header('Content-Type', 'application/json');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRutaRequest $request)
    {
        $nuevo = Ruta::create($request->all());
        return response()->json($nuevo->toArray());
    }

    /**
     * Display the specified resource.
     */
    public function show(Ruta $ruta)
    {
        return response()->json($ruta->toArray());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRutaRequest $request, Ruta $ruta)
    {
        $ruta->fill($request->all());
        //var_dump($request->all());
        $ruta->save();
        return response()->json($ruta->toArray());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($ruta)
    {
        $ruta = Ruta::find($ruta);
        $ruta->delete();
//            return response()->json($ruta->toArray());
        return response()->json(["sistema"=>"Registro borradó  $ruta"]);

    }

    public function unidades($ruta)
    {

        $puede = Gate::policy(RutaPolicy::class,'unidades')->allows('unidaes', $ruta);

        $ruta = Ruta::find($ruta);
        $ret = [
            'mensaje' => "FULANO: " .auth()->user()->nombre . " PUEDE:  '" . $puede ."'" ,
            'valor' => $ruta->unidades
        ];
        return response()->json($ret);



        if ($this->authorizeForUser(auth()->user(), 'unidades')) {
            // Lógica del controlador si la autorización tiene éxito
                $ret = [
                    'mensaje' => "",
                    'valor' => $ruta->unidades
                ];
                return response()->json($ret);
        } else {
            // Manejo de la autorización fallida
            return response()->json(['mensaje' => 'Autorización fallida'], 403);
        }


    }    
}
