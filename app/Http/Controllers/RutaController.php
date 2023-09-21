<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRutaRequest;
use App\Http\Requests\UpdateRutaRequest;
use App\Models\Ruta;

class RutaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Ruta::with('unidades')->get());
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
    public function destroy( $ruta)
    {

        
        if(is_null($ruta)){
            return response()->json(["error"=>"Registro no encontradó $ruta"],404);
        }else{
//            $ruta->delete();
            return response()->json(["sistema"=>"Registro borradó  $ruta"],404);
        }

    }
}
