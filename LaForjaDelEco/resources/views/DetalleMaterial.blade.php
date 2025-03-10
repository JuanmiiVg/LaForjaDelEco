<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Material Medieval</title>
    <link rel="stylesheet" href="{{ asset('css/anadir.css') }}">
    <link href="{{ asset('css/inventario.css') }}" rel="stylesheet">
</head>

<body>
    <div class="paginaForms">
        <div class="content">
            <div class="titulo">
                <h4>{{ $material->nombre }}</h4>
            </div>
            <div class="display">
                <p><strong>Peso:</strong>{{ $material->peso }} kg</p>
            </div>
            <div class="image">
                <img src="{{ asset('storage/' . $material->imagen) }}" alt="Material">
            </div>
            <div class="image">
                <a href="{{ route('user.index', ['id' => $user->id]) }}" class="boton">&nbsp;&nbsp;Volver&nbsp;&nbsp;</a>
            </div>
        </div>
    </div>
</body>

</html>
