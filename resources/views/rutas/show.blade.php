@extends('plantilla')
@section('contenido')
<p>
        nombre: {{$ruta->nombre}}<br>
        origen: {{$ruta->origen}}<br>
        destino: {{$ruta->destino}}<br>
        unidades: 
        <ul>
        @foreach ($unidades as $unidad)
            <li>{{$unidad->tipo}}</li>
        @endforeach
        </ul>

</p>
<a href="{{route("rutas.index")}}">Listado de rutas</a>
@endsection