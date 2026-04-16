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
    <div class="container mt-4">
        @include('partials.alerts')

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">Usuarios Registrados</h2>
            <form action="{{ route('cerrar') }}" method="POST">
                @csrf
                <button class="btn btn-sm btn-danger">Cerrar sesión</button>
            </form>
        </div>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                    <th>Enviar Aviso</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->phone }}</td>
                    <td class="text-nowrap">
                        <a href="{{ route('usuarios.edit', $item->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        
                        <form action="{{ route('usuarios.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar?')">Eliminar</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('usuarios.enviarAviso', $item->id) }}" method="POST">
                            @csrf
                            <div class="input-group input-group-sm">
                                <input type="text" name="mensaje" class="form-control" placeholder="Mensaje..." required>
                                <button class="btn btn-primary" type="submit">Enviar</button>
                            </div>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endsection

</body>
</html>