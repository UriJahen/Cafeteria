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

    <h1>EDITAR COMIDA: {{$comida->nombre}}</h1>
    
    <form action="{{route('comida.update', $comida->id)}}" method='POST'>
        @csrf 
        @method('PUT')
        
        <div>
            <label>Nombre:</label>
            <input type="text" name="nombre" placeholder="Nombre" value="{{$comida->nombre}}">
        </div>

        <div>
            <label>Descripción:</label>
            <input type="text" name="descripcion" placeholder="Descripción" value="{{$comida->descripcion}}">
        </div>

        <div>
            <label>Tipo:</label>
            <input type="text" name="tipo" placeholder="Tipo" value="{{$comida->tipo}}">
        </div>

        <div>
            <label>Precio:</label>
            <input type="number" name="precio" placeholder="0.00" step="0.01" value="{{$comida->precio}}">
        </div>

        <button type="submit">Guardar Cambios</button>
    </form>
    
    <br>
    <div class="d-flex justify-content-end mt-2">
        <a href="{{ route('comida.index') }}">class="btn btn-secondary">
            <i class="fa-solid fa-arrow-left"></i>  Volver
        </a>
    </div>

    @endsection
</body>
</html>
