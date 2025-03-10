<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingrediente Medieval</title>
    <link rel="stylesheet" href="{{ asset('css/anadir.css') }}">
    <link href="{{ asset('css/inventario.css') }}" rel="stylesheet">
</head>

<body>
    <div class="paginaForms">
        <div class="content">
            <div class="titulo">
                <h4>{{ $ingrediente->nombre }}</h4>
            </div>
            <div class="display">
                <p><strong>Peso:</strong>{{ $ingrediente->peso }} kg</p>
            </div>
            <div class="image">
                <img src="{{ asset('storage/' . $ingrediente->imagen) }}" alt="Ingrediente">
            </div>
            <div class="image">
                <a href="{{ route('user.index', ['id' => $user->id]) }}" class="boton">&nbsp;&nbsp;Volver&nbsp;&nbsp;</a>
            </div>
        </div>
    </div>
</body>

</html>