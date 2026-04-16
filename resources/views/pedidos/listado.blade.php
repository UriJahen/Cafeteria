<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
</head>
<body>
    @extends('layout.app')
    @section('content')
    @include('partials.alerts')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Listado de Pedidos</h1>
        <a href="{{ route('pedidos.create') }}" class="btn btn-success">
            <i class="fa-solid fa-plus"></i> Nuevo Pedido
        </a>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Mesa</th>
                <th>Platillo</th>
                <th>Cantidad</th>
                <th>Nota</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->id }}</td>
                    <td>{{ $pedido->mesa }}</td>
                    <td>{{ $pedido->platillo }}</td>
                    <td>{{ $pedido->cantidad }}</td>
                    <td>{{ $pedido->nota ?? 'Sin notas' }}</td>
                    <td>
                        <a href="{{ route('pedidos.edit', $pedido->id) }}" class="btn btn-warning btn-sm">
                            <i class="fa-solid fa-pen-to-square"></i> Editar
                        </a>

                        <form action="{{ route('pedidos.destroy', $pedido->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este pedido?')">
                                <i class="fa-solid fa-trash"></i> Borrar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-3">
        <a href="{{ route('comida.index') }}" class="btn btn-secondary">
            <i class="fa-solid fa-arrow-left"></i> Volver a Comidas
        </a>
    </div>
    @endsection

</body>
</html>