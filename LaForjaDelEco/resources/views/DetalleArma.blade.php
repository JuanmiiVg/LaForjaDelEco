<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Arma</title>
    <style>
        body {
            background-image: url('/images/bg-medieval.jpg');
            background-size: cover;
            color: #f4e2d8;
            font-family: 'MedievalSharp', cursive;
        }

        .medieval-bg {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background: rgba(0, 0, 0, 0.7);
            border: 2px solid #c9a227;
            border-radius: 10px;
            text-align: center;
        }

        .item-title {
            font-size: 28px;
            color: #d4af37;
            text-shadow: 2px 2px #000;
        }

        .btn-back {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 15px;
            background: #6b4226;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            border: 1px solid #a67c52;
        }

        .btn-back:hover {
            background: #8b5a2b;
        }
    </style>
</head>

<body>
    <div class="container medieval-bg">
        <div class="item-card">
            <h1 class="item-title">{{ $arma->nombre }}</h1>
            <p><strong>Categoría:</strong> {{ $arma->categoria }}</p>
            <p><strong>Tamaño:</strong> {{ $arma->tamaño }}</p>
            <p><strong>Daño:</strong> {{ $arma->daño }}</p>
            <p><strong>Peso:</strong> {{ $arma->peso }} kg</p>
        </div>
    </div>
    <a href="{{ route('user.index', ['id' => $user->id]) }}" class="btn-back">Volver</a>
</body>

</html>