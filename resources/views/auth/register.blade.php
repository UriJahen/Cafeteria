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
        <h1>Registro</h1>
        <form action="{{route('registro.store')}}" method = "POST">
            @csrf
<!--el nombre que esta aqui "name=" se debe colocar el mmismo que tenemos en la base de datos-->
            <input type="text" name="name" placeholder="Nombre" class="form-control" required> 
            <br>
            <input type="email"name="email" placeholder="Correo" class="form-control" required> 
            <br>
            <input type="text" name="phone" placeholder="Telefono" class="form-control" required> 
            <br>
            <input type="password" name="password" placeholder="Contraseña" class="form-control" required> 
            <br>
            <input type="password" name="password_confirmation" placeholder="confirmar contraseña" class="form-control" required> 
            <br>
        
<!--nota para la ed por que si no me pierdo, esta parte de aqui es la adaptacion para que solo un admin pueda registrar otro admin y toca modificar el controlador de authcontroller-->
            @auth 
                 @if(auth()->user()->is_admin)
                    <div class="form.check">
                        <input type="checkbox" name="is_admin" value="1">
                        <label >Es un Admin</label>
                    </div>
                @endif
            @endauth


            <button type="submit" class="btn btn-success">Guardar</button>


        </form>
    @endsection
    
</body>
</html>