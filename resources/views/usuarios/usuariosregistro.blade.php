<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @extends('layout.app')
    @section('content')
    @include('partials.alerts')

    <h1>Registros de usuarios</h1>
    <div class="d-flex justify-content-end mb-2">
        <form action="{{ route('cerrar') }}" method="POST">
            @csrf
            <button class= "btn btn-danger"> <i class="fa-solid fa-right-from-bracket"></i> Cerrar sesion </button>
        </form>


    </div>

    <br><br>

    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($user as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->phone }}</td>
                <td>
                    <a  href="{{ route('usuarios.edit', $item->id) }}" class="btn btn-warning">
                        <i class="fa-solid fa-pen-to-square"></i> Editar
                    </a>  
                    
                    <form action="{{ route('usuarios.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?')">
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