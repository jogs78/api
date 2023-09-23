@extends('plantilla')
@section('contenido')
<p>
        nombre: {{$ruta->nombre}}<br>
        origen: {{$ruta->origen}}<br>
        destino: {{$ruta->destino}}<br>

</p>
<a href="{{route("rutas.index")}}">Listado de rutas</a>
@endsection