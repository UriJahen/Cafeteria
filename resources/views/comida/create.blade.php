<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Comida</title>
</head>
<body>
    @extends('layout.app')
    @section('content')
    @include('partials.alerts')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Editar Comida: <span class="text-muted">{{$comida->nombre}}</span></h1>
        <a href="{{ route('comida.index') }}" class="btn btn-secondary">
            <i class="fa-solid fa-arrow-left"></i> Volver al listado
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-4">
            <form action="{{route('comida.update', $comida->id)}}" method="POST">
                @csrf 
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Nombre del Platillo</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-utensils"></i></span>
                            <input type="text" name="nombre" placeholder="Nombre" value="{{$comida->nombre}}" required class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Tipo de Comida</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-list"></i></span>
                            <input type="text" name="tipo" placeholder="Tipo" value="{{$item->tipo ?? $comida->tipo}}" required class="form-control">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Descripción</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa-solid fa-align-left"></i></span>
                        <textarea name="descripcion" placeholder="Descripción" required class="form-control" rows="3">{{$comida->descripcion}}</textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Precio</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-dollar-sign"></i></span>
                            <input type="number" name="precio" placeholder="0.00" step="0.01" value="{{$comida->precio}}" required class="form-control">
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-2 mt-4">
                    <button type="submit" class="btn btn-warning btn-lg fw-bold">
                        <i class="fa-solid fa-floppy-disk"></i> Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>

    @endsection
</body>
</html>
