<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poción Medieval</title>
    <link rel="stylesheet" href="{{ asset('css/anadir.css') }}">
    <link href="{{ asset('css/inventario.css') }}" rel="stylesheet">
</head>

<body>
    <div class="paginaForms">
        <div class="content">
            <div class="titulo">
                <h4>{{ $pocion->nombre }}</h4>
            </div>
            <div class="display">
                <p><strong>Duración:</strong>{{ $pocion->duracion }}</p>
                <p><strong>Efecto:</strong>{{ $pocion->efecto }}</p>
                <p><strong>Peso:</strong>{{ $pocion->peso }} kg</p>
            </div>
            <div class="image">
                <img src="{{ asset('storage/' . $pocion->imagen) }}" alt="Poción">
            </div>
            <div class="image">
                <a href="{{ route('user.index', ['id' => $user->id]) }}" class="botonF">&nbsp;&nbsp;Volver&nbsp;&nbsp;</a>
            </div>
        </div>
    </div>
</body>

</html>