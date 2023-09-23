@extends('plantilla')
@section('contenido')
<p>
    <table border="1">
        <thead>
            <th>id</th>
            <th>nombre</th>
            <th>origen</th>
            <th>destino</th>
            <th>acciones</th>        
        </thead>
        <tbody>
            @forelse ($rutas as $ruta)
                <tr>
                    <td>
                        {{$ruta->id}}
                    </td>
    
                    <td>
                        <a href="{{route("rutas.show",$ruta->id) }}">
                            {{$ruta->nombre}}
                        </a>
                    </td>
                    <td>{{$ruta->origen}}</td>
                    <td>{{$ruta->destino}}</td>
                    <td> <a href="{{route("rutas.edit",$ruta->id)}}">EDITAR</a> 
                        <form action="{{route("rutas.destroy",$ruta->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="BORRAR">
                        </form>
                    
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Sin rutas</td>
                </tr>
            @endforelse
        </tbody>
    </table>    
</p>
<p>
    <a href="{{route("rutas.create")}}">AGREGAR</a>
</p>

    @foreach ($rutas as $ruta)
    @endforeach
@endsection