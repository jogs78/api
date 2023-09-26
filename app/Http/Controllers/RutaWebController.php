<?php

namespace App\Http\Controllers;

use App\Models\Ruta;
use App\Models\Unidad;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class RutaWebController extends Controller
{
    private $modo="API";
    private $end="";
    private $headers=[];
    
    public function __construct()
    {
        $this->end = config('api.api_endpoint');
        $this->headers = config('api.api_headers');
    }
    

    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        if ($this->modo == "WEB"){
            $rutas = Ruta::all();
        }else{
            $response = Http::withHeaders($this->headers)->get("$this->end/api/rutas");
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
            $ruta->save();    
            /* falta revisar si efectivamente lo dio de alta */
            return redirect(route("rutas.index"));
        }else{
            $response = Http::withHeaders($this->headers)->post("$this->end/api/rutas/", $request->all());
            switch ($response->status()) {
                case '200':
                    return redirect(route("rutas.index"));
                    break;
                case '422':
                    return back()->withErrors($response->json('errors'))->withInput();
                    break;                
                default:
                    # code...
                    break;
            }
            //status 422 no se puede procesar
            //successful true

            dump($response->status());

            echo "si quiere ir <a href='"  . route("rutas.index") ."'>listado</a>";
        }
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
            $response = Http::withHeaders($this->headers)->get("$this->end/api/rutas/$id");
            $datos = $response->json();
            $ruta =  new Ruta($datos);

            $response = Http::withHeaders($this->headers)->get("$this->end/api/rutas/$id/unidades");
            $unidades2 = $response->collect();
            $unidades = $unidades2->map(function ($elemento) {
                return new Unidad($elemento);
            });    

            
            

        }
        return view("rutas.show",compact('ruta','unidades'));
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
            $response = Http::withHeaders($this->headers)->put("$this->end/api/rutas/$id", $request->all());
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
             $response = Http::withHeaders($this->headers)->delete("$this->end/api/rutas/$id");
        }
        return redirect(route("rutas.index"));

    }
}
