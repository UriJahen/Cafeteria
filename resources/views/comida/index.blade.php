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

    <!-- Sección de Recomendación Basada en el Clima -->
    @if($datos && $comidaRecomendada)
    <div class="alert alert-info shadow-sm mb-4" style="border-left: 5px solid #0dcaf0;">
        <div class="d-flex align-items-center">
            <div class="me-3">
                <i class="fa-solid fa-cloud-sun fa-2x text-info"></i>
            </div>
            <div>
                <h5 class="mb-1"><strong>{{ $datos['name'] }}: {{ round($temperatura) }}°C</strong></h5>
                <p class="mb-0">
                    {{ $motivoRecomendacion }} 
                    Hoy te sugerimos destacar: <strong>{{ $comidaRecomendada->nombre }}</strong> 
                    <span class="badge bg-info text-dark ms-2">${{ number_format($comidaRecomendada->precio, 2) }}</span>
                </p>
            </div>
        </div>
    </div>
    @endif

    <h1>Registros de Comida</h1>

    <div class="d-flex justify-content-end mb-2">
        <a href="{{route('comida.create')}}" class="btn btn-success mb-3 me-3">
           <i class="fa-solid fa-plus"></i> Nueva comida 
        </a>

        <a href="{{ route('pedidos.index') }}" class="btn btn-primary mb-3 me-3">
        <i class="fa-solid fa-clipboard-list"></i> Gestionar Pedidos
        </a>
        
        <form action="{{ route('cerrar') }}" method="POST" class="me-3">
            @csrf
            <button class= "btn btn-danger"> <i class="fa-solid fa-right-from-bracket"></i> Cerrar sesion </button>
        </form>

        @if(auth()->user()->is_admin)
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mb-3">
                Panel Admin
            </a>
        @endif
    </div>

    <br>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th style="width: 20%;">Nombre</th>
                    <th style="width: 35%;">Descripción</th>
                    <th style="width: 15%;">Tipo</th>
                    <th style="width: 10%;">Precio</th>
                    <th style="width: 20%;" class="text-center">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($comida as $item)
                <tr>
                    <td class="fw-bold">{{ $item->nombre }}</td>
                    <td>{{ Str::limit($item->descripcion, 100) }}</td>
                    <td>{{ $item->tipo }}</td>
                    <td class="fw-bold">${{ number_format($item->precio, 2) }}</td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ route('comida.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                <i class="fa-solid fa-pen-to-square"></i> Editar
                            </a>
                            
                            <form action="{{ route('comida.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar registro?')">
                                    <i class="fa-solid fa-trash"></i> Eliminar
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @endsection
</body>
</html>
