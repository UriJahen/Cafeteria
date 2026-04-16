<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recomendación de Platillo - Café</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container-main {
            width: 100%;
            padding: 20px;
        }

        .card-recomendacion {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            max-width: 600px;
            margin: 0 auto;
        }

        .card-recomendacion:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.3);
        }

        .card-header-clima {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }

        .temperatura-grande {
            font-size: 4rem;
            font-weight: bold;
            margin: 10px 0;
        }

        .ciudad-nombre {
            font-size: 1.5rem;
            font-weight: 500;
            margin-bottom: 10px;
        }

        .descripcion-clima {
            font-size: 1.1rem;
            text-transform: capitalize;
            opacity: 0.95;
        }

        .card-body {
            padding: 40px 30px;
            background: white;
        }

        .motivo-recomendacion {
            background: #f8f9fa;
            border-left: 4px solid #667eea;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 25px;
            font-size: 1rem;
            color: #333;
            font-style: italic;
        }

        .platillo-titulo {
            font-size: 2rem;
            color: #667eea;
            font-weight: bold;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .platillo-tipo {
            display: inline-block;
            background: #667eea;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.85rem;
            margin-bottom: 15px;
            font-weight: 500;
        }

        .platillo-descripcion {
            color: #666;
            font-size: 1rem;
            margin-bottom: 15px;
            line-height: 1.6;
        }

        .platillo-precio {
            font-size: 1.8rem;
            color: #764ba2;
            font-weight: bold;
            margin-top: 20px;
        }

        .detalles-clima {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-top: 25px;
            padding-top: 25px;
            border-top: 1px solid #e0e0e0;
        }

        .detalle-item {
            text-align: center;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 10px;
        }

        .detalle-icono {
            font-size: 1.8rem;
            color: #667eea;
            margin-bottom: 8px;
        }

        .detalle-valor {
            font-size: 1.3rem;
            font-weight: bold;
            color: #333;
        }

        .detalle-label {
            font-size: 0.85rem;
            color: #666;
            margin-top: 5px;
        }

        .sin-recomendacion {
            text-align: center;
            padding: 30px;
            color: #666;
        }

        .sin-recomendacion i {
            font-size: 3rem;
            color: #ddd;
            margin-bottom: 15px;
        }

        .btn-volver {
            margin-top: 20px;
            text-align: center;
        }

        .btn-volver a {
            background: #667eea;
            color: white;
            padding: 10px 30px;
            border-radius: 25px;
            text-decoration: none;
            transition: background 0.3s ease;
            display: inline-block;
        }

        .btn-volver a:hover {
            background: #764ba2;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container-main">
        <div class="card-recomendacion">
            <!-- Encabezado con información del clima -->
            <div class="card-header-clima">
                <div class="ciudad-nombre">
                    <i class="bi bi-geo-alt-fill"></i> {{ $datos['name'] }}
                </div>
                <div class="temperatura-grande">
                    {{ round($temperatura) }}°C
                </div>
                <div class="descripcion-clima">
                    {{ $datos['weather'][0]['description'] }}
                </div>
            </div>

            <!-- Cuerpo con la recomendación -->
            <div class="card-body">
                <!-- Motivo de la recomendación -->
                <div class="motivo-recomendacion">
                    <i class="bi bi-lightbulb-fill"></i> {{ $motivoRecomendacion }}
                </div>

                <!-- Platillo recomendado -->
                @if($comidaRecomendada)
                    <div class="platillo-titulo">
                        <i class="bi bi-star-fill"></i> {{ $comidaRecomendada->nombre }}
                    </div>

                    <span class="platillo-tipo">{{ ucfirst($comidaRecomendada->tipo) }}</span>

                    <p class="platillo-descripcion">
                        {{ $comidaRecomendada->descripcion }}
                    </p>

                    <div class="platillo-precio">
                        ${{ number_format($comidaRecomendada->precio, 2) }}
                    </div>

                    <!-- Detalles del clima -->
                    <div class="detalles-clima">
                        <div class="detalle-item">
                            <div class="detalle-icono">
                                <i class="bi bi-droplet-fill"></i>
                            </div>
                            <div class="detalle-valor">{{ $datos['main']['humidity'] }}%</div>
                            <div class="detalle-label">Humedad</div>
                        </div>
                        <div class="detalle-item">
                            <div class="detalle-icono">
                                <i class="bi bi-wind"></i>
                            </div>
                            <div class="detalle-valor">{{ $datos['wind']['speed'] }} m/s</div>
                            <div class="detalle-label">Viento</div>
                        </div>
                    </div>
                @else
                    <div class="sin-recomendacion">
                        <i class="bi bi-inbox"></i>
                        <p>No hay platillos disponibles en este momento para recomendar.</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Botón para volver -->
        <div class="btn-volver">
            <a href="{{ route('comida.index') }}">
                <i class="bi bi-arrow-left"></i> Volver al menú
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>