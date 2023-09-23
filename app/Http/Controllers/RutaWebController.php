<?php

namespace App\Http\Controllers;

use App\Models\Ruta;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class RutaWebController extends Controller
{
    private $modo="API";
//    private $end="http://api.vagrant";
//private $end="http://192.168.56.106:8000";
private $end="http://api.ittg.mx";

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if ($this->modo == "WEB"){
            $rutas = Ruta::all();
        }else{
            $response = Http::get("$this->end/api/rutas");
            $rutas2 = $response->collect();
            $rutas = $rutas2->map(function ($elemento) {
                return new Ruta($elemento);
            });    
        }
        return view("rutas.index",compact('rutas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("rutas.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($this->modo == "WEB"){
            $ruta = new Ruta($request->all());
//            $ruta->fill();
            $ruta->save();    
            /* falta revisar si efectivamente lo dio de alta */
        }else{
            $response = Http::post("$this->end/api/rutas/", $request->all());
            /* falta revisar si efectivamente lo dio de alta */
        }
        return redirect(route("rutas.index"));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if ($this->modo == "WEB"){
            $ruta = Ruta::find($id);
            /* falta revisar si efectivamente lo dio de alta */
        }else{
            $response = Http::get("$this->end/api/rutas/$id");
            $datos = $response->json();
            $ruta =  new Ruta($datos);
        }
        return view("rutas.show",compact('ruta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if ($this->modo == "WEB"){
            $ruta = Ruta::find($id);
            /* falta revisar si efectivamente lo dio de alta */
        }else{
            $response = Http::get("$this->end/api/rutas/$id");
            $datos = $response->json();
            $ruta =  new Ruta($datos);
        }


        return view("rutas.edit",compact('ruta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($this->modo == "WEB"){
            $ruta = Ruta::find($id);
            $ruta->fill($request->all());
            $ruta->save();    
            /* falta revisar si efectivamente se actualizo */
        }else{
            $response = Http::put("$this->end/api/rutas/$id", $request->all());
        }
        return redirect(route("rutas.index"));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if ($this->modo == "WEB"){
            $ruta = Ruta::find($id);
            $ruta->delete();
            /* falta revisar si efectivamente se actualizo */
        }else{
            dump("a borrar con:" . "$this->end/api/rutas/$id");
            $response = Http::delete("$this->end/api/rutas/$id");
        }
//        return redirect(route("rutas.index"));

    }
}
