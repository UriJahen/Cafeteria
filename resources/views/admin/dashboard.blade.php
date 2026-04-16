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
    @include('partials.alerts')
    
        <h1>Panel admin</h1>
        <form action="{{route ('registro.store')}}">
            <button type="submit" class="btn btn-success m-3">Registrar</button>

        </form>

        <form action="{{route ('usuarios')}}">
            <button type="submit" class="btn btn-success m-3">Editar Usuarios</button>
        </form>

        <form action="{{route ('pedidos.index')}}">
            <button type="submit" class="btn btn-success m-3">Gestion de pedidos</button>
        </form>


    @endsection



</body>
</html>