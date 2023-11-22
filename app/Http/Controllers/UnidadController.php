<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUnidadRequest;
use App\Http\Requests\UpdateUnidadRequest;
use App\Models\Unidad;

class UnidadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return response(Unidad::all(), 200)->header('Content-Type', 'application/json');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUnidadRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Unidad $unidad)
    {
        return response($unidad, 200)->header('Content-Type', 'application/json');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUnidadRequest $request, Unidad $unidad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unidad $unidad)
    {
        //
    }
}
