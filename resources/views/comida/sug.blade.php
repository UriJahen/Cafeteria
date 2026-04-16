<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Clima actual</h1>

    <p>Ciudad: {{ $datos['name'] }}</p>
    <p>Temperatura: {{ $datos['main']['temp'] }} °C</p>
    <p>Clima: {{ $datos['weather'][0]['description'] }}</p>
    <p>Humedad: {{ $datos['main']['humidity'] }}%</p>
    <p>Viento: {{ $datos['wind']['speed'] }} m/s</p>
</body>
</html>