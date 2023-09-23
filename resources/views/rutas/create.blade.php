@extends('plantilla')
@section('contenido')
<p>
    <form action="{{route("rutas.store")}}" method="post">
        <label>nombre</label><input type="text" name="nombre" id="nombre"><br>
        <label>origen</label><input type="text" name="origen" id="origen"><br>
        <label>destino</label><input type="text" name="destino" id="destino"><br>
        @csrf
        <input type="submit" value="Enviar">
    </form>
</p>
@endsection