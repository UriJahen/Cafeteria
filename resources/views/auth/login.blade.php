<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    @extends('layout.app')
    @section('content')
    <h1>Inicio de sesion</h1>

    <form action="{{route ('acceso.store')}}" method="Post">
        @csrf
        <input type="text" name="email" placeholder="correo" class="form-control" required> 
        <input type="text" name="password" placeholder="contraseña" class="form-control" required>

        <button type="submit" class="btn btn-success m-3" >Iniciar sesion</button>

    </form>

    <form action="{{route ('registro.store')}}">
        <button type="submit" class="btn btn-success m-3">Registrarse</button>

    </form>
    



    @endsection
    
</body>
</html>