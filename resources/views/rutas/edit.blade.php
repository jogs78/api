@extends('plantilla')
@section('contenido')
<p>
    <form action="{{route("rutas.update",$ruta->id)}}" method="post">
        @method('PUT')
        <label>Nombre</label><input type="text" name="nombre" id="nombre" value="{{$ruta->nombre}}"><br>
        <label>origen</label><input type="text" name="origen" id="origen" value="{{$ruta->origen}}"><br>
        <label>destino</label><input type="text" name="destino" id="destino" value="{{$ruta->destino}}"><br>
        @csrf
        <input type="submit" value="ACTUALIZAR">
    </form>
</p>
@endsection