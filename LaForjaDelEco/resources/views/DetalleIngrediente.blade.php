<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/LaForjaDelEco/public/Img/gato.jpg">
    <title>Ingrediente Medieval</title>
    <style>
        body {
            background-image: url("../Img/f71d736cf5398cc35222f2e9d95518f0.jpg");
        }
        .container {
            display: flex;
            width: 100vw;
            height: 100vh;
            align-items: center;
            justify-content: center;
            padding: 20px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.7);
        }
        .content {
            display: flex;
            width: 80%;
            justify-content: center;
            align-items: center;
            height: 700px;
            max-width: 1000px;
            background: rgba(62, 44, 28, 0.631);
            padding: 30px;
            border: 10px double #1c180ff4;
            border-radius: 20px;
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.5);
        }
        .titulo{
            display: flex;
            justify-content: center;
            align-items: top;
        }
        .info {
            width: 50%;
            padding: 20px;
            text-align: left;
        }
        .image {
            width: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        img {
            max-width: 100%;
            border: 5px solid #d4af37;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="titulo">
                <h1>{{ $ingrediente->nombre }}</h1>
            </div>
            <div class="info">
                <p><strong>Peso:</strong>{{ $ingrediente->peso }} kg</p>
                <!--a-->
            </div>
            <div class="image">
                <img src="" alt="Pocion">
            </div>
        </div>
    </div>
    <a href="{{ route('user.index', ['id' => $user->id]) }}" class="btn-back">Volver</a>
</body>
</html>