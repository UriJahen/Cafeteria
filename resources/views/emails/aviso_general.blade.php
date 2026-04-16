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
        <h2>Aviso Importante de Café</h2>
        <p>El administrador del sistema te ha enviado el siguiente mensaje:</p>
        
        <div class="message-box">
            "{{ $mensaje }}"
        </div>

        <p>Si tienes alguna duda, por favor acércate al mostrador o contacta con soporte.</p>
        
    </div>
</body>
</html>
