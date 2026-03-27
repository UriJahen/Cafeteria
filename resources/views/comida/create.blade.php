<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Comida</title>
</head>
<body>
    <h1>Registrar comida</h1>

    @extends('layout.app')
    @section('content')
    @include('partials.alerts')

    <form action="{{ route('comida.store') }}" method="POST">
        @csrf

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-book"></i></span>
            <input type="text" name="nombre" placeholder="Nombre" required class="form-control">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-book"></i></span>
            <input type="text" name="descripcion" placeholder="Descripcion" required class="form-control">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-book"></i></span>
            <input type="text" name="tipo" placeholder="Tipo" required class="form-control">
        </div>
        
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-book"></i></span>
            <input type="number" step="0.01" name="precio" placeholder="Precio" required class="form-control">
        </div>

        <button type="submit">Crear</button>
    </form>
    
    <br>
    <a href="{{ route('comida.index') }}">Volver al listado</a>
 
    @endsection


</body>
</html>
