<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Comida</title>
</head>
<body>
    @extends('layout.app')
    @section('content')
    @include('partials.alerts')



    <h1>Registros de Comida</h1>

    <div class="d-flex justify-content-end mb-2">
        <a href="{{route('comida.create')}}" class="btn btn-success mb-3 me-3">
           <i class="fa-solid fa-plus"></i> Nueva comida 
        </a>
        
        <form action="{{ route('cerrar') }}" method="POST">
            @csrf
            <button class= "btn btn-danger"> <i class="fa-solid fa-right-from-bracket"></i> Cerrar sesion </button>
        </form>

        @if(auth()->user()->is_admin)
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mb-3">
                Panel Admin
            </a>
        @endif

    </div>

    <br><br>

    
    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Tipo</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($comida as $item)
            <tr>
                <td>{{ $item->nombre }}</td>
                <td>{{ $item->descripcion }}</td>
                <td>{{ $item->tipo }}</td>
                <td>{{ $item->precio }}</td>
                <td>
                    <a href="{{ route('comida.edit', $item->id) }}" class="btn btn-warning">
                        <i class="fa-solid fa-pen-to-square"></i> Editar
                    </a>
                    
                    <form action="{{ route('comida.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Eliminar registro?')">
                            <i class="fa-solid fa-trash"></i> Eliminar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @endsection
</body>
</html>
