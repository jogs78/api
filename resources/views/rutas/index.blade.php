@extends('plantilla')
@section('contenido')
<table border="1">
    <thead>
        <th>id</th>
        <th>nombre</th>
        <th>origen</th>
        <th>destino</th>
        <th>unidades</th>
        <th>acciones</th>        
    </thead>
    <tbody>
        @forelse ($rutas as $ruta)
            <tr>
                <td>{{$ruta->id}}</td>

                <td>
                    {{$ruta->nombre}}
                </td>
                <td>{{$ruta->origen}}</td>
                <td>{{$ruta->destino}}</td>
                <td>
                    <ul>
                        @foreach ($ruta->unidades as $unidad)
                            <li>{{$unidad->tipo}}</li>
                        @endforeach

                    </ul>
                </td>
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