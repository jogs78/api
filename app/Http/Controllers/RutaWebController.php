<?php

namespace App\Http\Controllers;

use App\Models\Ruta;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\StoreRutaRequest;
use App\Http\Requests\UpdateRutaRequest;

class RutaWebController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $rutas = Ruta::all();
        $response = Http::get('http://api.ittg.mx/api/rutas');
        $rutas2 = $response->collect();
        $rutas = $rutas2->map(function ($elemento) {
            return new Ruta($elemento);
        });

        return view("rutas.index",compact('rutas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRutaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRutaRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
