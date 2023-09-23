@extends('plantilla')
@section('contenido')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<p>
    <form action="{{route("rutas.store")}}" method="post">
        <label>nombre</label><input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}"><br>
        <label>origen</label><input type="text" name="origen" id="origen" value="{{ old('origen') }}"><br>
        <label>destino</label><input type="text" name="destino" id="destino" value="{{ old('destino') }}"><br>
        @csrf
        <input type="submit" value="Enviar">
    </form>
</p>
@endsection