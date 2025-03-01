<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/inventario.css') }}">
</head>

<body>
    <div class="grid-container">
        <div class="izquierda">
            <div class="perfil">
                @if($master->imagen)
                <img src="{{ asset('storage/' . $user->imagen) }}" height="250" alt="Imagen del Personaje"><br>
                @else
                <img src="{{ asset('Img/9ceb07252b117d785feb84c1c3d589b7-removebg-preview.png') }}" height="250" alt="Imagen por Defecto"><br>
                @endif
                <label for="perfil">{{ $master->nombreMaster }}</label>
                <p>Codigo de Master: {{$master->id}}</p>
            </div>
        </div>
        <div class="derecha">
            @foreach($users as $user)
            <div class="cuadrado">
                @if($user->imagen)
                <img class="item" src="{{ asset('storage/' . $user->imagen) }}" height="250" alt="Imagen del Personaje">
                @else
                <img class="item" src="{{ asset('Img/9ceb07252b117d785feb84c1c3d589b7-removebg-preview.png') }}" height="250" alt="Imagen por Defecto"><br>
                @endif
                <p>{{ $user->nombrePersonaje }}</p>
                <div class="botones">
                    <button class="boton">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                    <button class="boton">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                </div>
                <div class="botones">
                    <button class="boton">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                    <button class="boton">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                </div>
            </div>
            @endforeach
        </div>
        
    </div>
</body>
</html>