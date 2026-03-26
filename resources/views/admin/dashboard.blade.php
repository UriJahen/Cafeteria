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
        <h1>Panel admin</h1>
        <form action="{{route ('registro.store')}}">
            <button type="submit" class="btn btn-success m-3">Registrar</button>
        </form>


    @endsection



</body>
</html>