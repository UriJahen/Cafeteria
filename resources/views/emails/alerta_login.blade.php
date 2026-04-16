<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <style>
        .container{
            font-family:Arial;
            background: #f4f4f4;
            padding: 20px;
        
            }
        .container{
            background: #ffff;
            padding: 20px;
            border-raduis: 10px;
        }
        .btn{
            background: blue;
            color: #ffff;
            text-decoration: none;
            padding: 10px 20px;
            border-raduis: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Nuevo inicio de sesión detectado</h1>
        <p>Te informamos que se ha detectado un nuevo acceso a tu cuenta</p>
        <p>Si fuiste tú, puedes ignorar este mensaje. De lo contrario, te recomendamos contactar al administrador para cambiar tu contraseña.</p>
        
        <center>
            <a href="{{ route('acceso') }}" class="btn">Ir al Sistema</a>
        </center>

    </div>
</body>
</html>
