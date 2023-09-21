@extends('plantilla')
@section('contenido')
<table border="1">
    <thead>
        <th>nombre</th>
        <th>origen</th>
        <th>destino</th>
        <th>acciones</th>        
    </thead>
    <tbody>
        @forelse ($rutas as $ruta)
            <tr>
                <td>{{$ruta->nombre}}</td>
                <td>{{$ruta->origen}}</td>
                <td>{{$ruta->destino}}</td>
                <td></td>
            </tr>
        @empty
            <tr>
                <td colspan="4">Sin rutas</td>
            </tr>
        @endforelse
    </tbody>
</table>

    @foreach ($rutas as $ruta)
    @endforeach
@endsection