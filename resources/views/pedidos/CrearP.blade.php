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
        <div class="card-header bg-success text-white">
            <h2 class="mb-0">Registrar Nuevo Pedido</h2>
        </div>
        <div class="card-body">
            @include('partials.alerts')

            <form action="{{ route('pedidos.store') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label for="mesa" class="form-label">Número de Mesa:</label>
                    <input type="text" name="mesa" id="mesa" class="form-control" placeholder="ejemplo 12, 6, 9" required value="{{ old('mesa') }}">
                </div>

                <div class="mb-3">
                    <label for="platillo" class="form-label">Platillo:</label>
                    <input type="text" name="platillo" id="platillo" class="form-control" placeholder="Nombre del plato" required value="{{ old('platillo') }}">
                </div>

                <div class="mb-3">
                    <label for="cantidad" class="form-label">Cantidad:</label>
                    <input type="number" name="cantidad" id="cantidad" class="form-control" min="1" required value="{{ old('cantidad', 1) }}">
                </div>

                <div class="mb-3">
                    <label for="nota" class="form-label">Notas Especiales:</label>
                    <textarea name="nota" id="nota" class="form-control" rows="3" placeholder="ej Sin cebolla">{{ old('nota') }}</textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('pedidos.index') }}" class="btn btn-secondary">
                        <i class="fa-solid fa-arrow-left"></i> Volver al Listado
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="fa-solid fa-check"></i> Guardar Pedido
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endsection

</body>
</html>