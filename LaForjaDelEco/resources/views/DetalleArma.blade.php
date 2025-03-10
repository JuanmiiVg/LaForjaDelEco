<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arma Medieval</title>
    <link rel="stylesheet" href="{{ asset('css/anadir.css') }}">
    <link href="{{ asset('css/inventario.css') }}" rel="stylesheet">
</head>

<body>
    <div class="paginaForms">
        <div class="content">
            <div class="titulo">
                <h4>{{ $arma->nombre }}</h4>
            </div>
            <div class="display">
                <p><strong>Categoría:</strong>{{ $arma->categoria }}</p>
                <p><strong>Agarre:</strong>
                    @if($arma->tamano == 1)
                    A una mano
                    @elseif($arma->tamano == 2)
                    A dos manos
                    @else
                    Desconocido
                    @endif
                </p>
                <p><strong>Daño:</strong>{{ $arma->dano }}</p>
                <p><strong>Peso:</strong>{{ $arma->peso }} kg</p>
            </div>
            <div class="image">
                <img src="{{ asset('storage/' . $arma->imagen) }}" alt="Arma">
            </div>
            <div class="image">
            <a href="{{ route('user.index', ['id' => $user->id]) }}" class="boton">&nbsp;&nbsp;Volver&nbsp;&nbsp;</a>
            </div>
            
        </div>
    </div>
</body>

</html>