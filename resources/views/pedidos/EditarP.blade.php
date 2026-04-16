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
    <div class="card shadow">
        <div class="card-header bg-warning">
            <h2 class="mb-0 text-dark">Editar Pedido</h2>
        </div>
        <div class="card-body">
            @include('partials.alerts')

            <form action="{{ route('pedidos.update', $pedido->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="mesa" class="form-label">Número de Mesa:</label>
                    <input type="text" name="mesa" id="mesa" class="form-control" value="{{ old('mesa', $pedido->mesa) }}" required>
                </div>

                <div class="mb-3">
                    <label for="platillo" class="form-label">Platillo:</label>
                    <input type="text" name="platillo" id="platillo" class="form-control" value="{{ old('platillo', $pedido->platillo) }}" required>
                </div>

                <div class="mb-3">
                    <label for="cantidad" class="form-label">Cantidad:</label>
                    <input type="number" name="cantidad" id="cantidad" class="form-control" min="1" value="{{ old('cantidad', $pedido->cantidad) }}" required>
                </div>

                <div class="mb-3">
                    <label for="nota" class="form-label">Notas Especiales:</label>
                    <textarea name="nota" id="nota" class="form-control" rows="3">{{ old('nota', $pedido->nota) }}</textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('pedidos.index') }}" class="btn btn-secondary">
                        <i class="fa-solid fa-arrow-left"></i> Volver al Listado
                    </a>
                    <button type="submit" class="btn btn-warning">
                        <i class="fa-solid fa-floppy-disk"></i> Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endsection

</body>
</html>