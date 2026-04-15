<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
</head>
<body>
    @extends('layout.app')
    @section('content')
    <h1>Editar Usuario: {{$user->name}}</h1>

    <form action="{{route('registro.update', $user->id)}}" method='POST'>
        @csrf
        @method('PUT')

        <div>
            <label>Nombre:</label>
            <input type="text" name="name" placeholder="Nombre" value="{{$user->name}}">
        </div>


        <div>
            <label>Correo:</label>
            <input type="text" name="email" placeholder="Correo" value="{{$user->email}}">
        </div>

        <div>
            <label>Telefono:</label>
            <input type="text" name="phone" placeholder="Telefono" value="{{$user->phone}}">
        </div>
        
        <div>
            <label>Contraseña:</label>
            <input type="password" name="password" placeholder="Contraseña" value="{{$user->password}}">
        </div>

        <button type="submit">Guardar Cambios</button>
    </form>
    
    <br>
    <div class="d-flex justify-content-end mt-2">
        <a href="{{ route('comida.index') }}">
            <i class="fa-solid fa-arrow-left"></i>  Volver
        </a>
    </div>

    @endsection

</body>
</html>