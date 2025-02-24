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
            <div class="perfil"> <img src="{{ asset('Img/images-removebg-preview.png') }}" height="250" alt=""><br>
                <label for="perfil">{{ $personaje->nombrePersonaje }}</label>
            </div>
            <div class="equipamiento">
                <div class="manoI"><img height="100" src="{{ asset('Img/ca6ce0c083114292bb032634564fa849-removebg-preview.png') }}" alt="armaI"></div>

                <div class="manoD"><img height="100" src="{{ asset('Img/ca6ce0c083114292bb032634564fa849-removebg-preview.png') }}" alt="armaD"></div>
            </div>
            <style>
                #caracteristicas input[type="range"] {
                    margin-bottom: 5px;
                }
            </style>
            <div id="caracteristicas">
                <label for="Vigor">Vigor</label><br>
                <input id="vigor" value="{{ $caracteristicas->vigor }}" type="range" min="0" max="100" oninput="document.getElementById('vigorValue').innerText = this.value;"><span id="vigorValue">{{ $caracteristicas->vigor }}</span><br>
                <label for="Aguante">Aguante</label><br>
                <input id="aguante" value="{{ $caracteristicas->aguante }}" type="range" min="0" max="100" oninput="document.getElementById('aguanteValue').innerText = this.value;"><span id="aguanteValue">{{ $caracteristicas->aguante }}</span><br>
                <label for="Fuerza">Fuerza</label><br>
                <input id="fuerza" value="{{ $caracteristicas->fuerza }}" type="range" min="0" max="100" oninput="document.getElementById('fuerzaValue').innerText = this.value;"><span id="fuerzaValue">{{ $caracteristicas->fuerza }}</span><br>
                <label for="Destreza">Destreza</label><br>
                <input id="destreza" value="{{ $caracteristicas->destreza }}" type="range" min="0" max="100" oninput="document.getElementById('destrezaValue').innerText = this.value;"><span id="destrezaValue">{{ $caracteristicas->destreza }}</span><br>
                <label for="Inteligencia">Inteligencia</label><br>
                <input id="inteligencia" value="{{ $caracteristicas->inteligencia }}" type="range" min="0" max="100" oninput="document.getElementById('inteligenciaValue').innerText = this.value;"><span id="inteligenciaValue">{{ $caracteristicas->inteligencia }}</span><br>
                <label for="Arcano">Arcano</label><br>
                <input id="arcano" value="{{ $caracteristicas->arcano }}" type="range" min="0" max="100" oninput="document.getElementById('arcanoValue').innerText = this.value;"><span id="arcanoValue">{{ $caracteristicas->arcano }}</span><br>
            </div>
        </div>
        <div class="derecha">
            <div class="cuadrado"></div>
            <div class="cuadrado"></div>
            <div class="cuadrado"></div>
            <div class="cuadrado"></div>
            <div class="cuadrado"></div>
            <div class="cuadrado"></div>
            <div class="cuadrado"></div>
            <div class="cuadrado"></div>
            <div class="cuadrado"></div>
            <div class="cuadrado"></div>
            <div class="cuadrado"></div>
            <div class="cuadrado"></div>
            <div class="cuadrado"></div>
            <div class="cuadrado"></div>
            <div class="cuadrado"></div>
            <div class="cuadrado"></div>
            <div class="cuadrado"></div>
            <div class="cuadrado"></div>
            <div class="cuadrado"></div>
            <div class="cuadrado"></div>
            <div class="cuadrado"></div>
            <div class="cuadrado"></div>
            <div class="cuadrado"></div>
            <div class="cuadrado"></div>
            <div class="cuadrado"></div>
            <div class="cuadrado"></div>
            <div class="cuadrado"></div>
            <div class="cuadrado"></div>
            <div class="cuadrado"></div>
            <div class="cuadrado"></div>
            <div class="cuadrado"></div>
            <div class="cuadrado"></div>
        </div>
    </div>
</body>

</html>