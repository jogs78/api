<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChoferRequest;
use App\Http\Requests\UpdateChoferRequest;
use App\Models\Chofer;

class ChoferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChoferRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Chofer $chofer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChoferRequest $request, Chofer $chofer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chofer $chofer)
    {
        //
    }
}
