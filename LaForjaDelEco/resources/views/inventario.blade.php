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
            <div class="perfil"> <img src="Img/images-removebg-preview.png" height="250" alt=""><br>
                <label for="perfil">Nombre de usuario</label>
            </div>
            <div class="equipamiento">
                <div class="manoI"><img height="100" src="Img/ca6ce0c083114292bb032634564fa849-removebg-preview.png" alt="armaI"></div>

                <div class="manoD"><img height="100" src="Img/ca6ce0c083114292bb032634564fa849-removebg-preview.png" alt="armaD"></div>
            </div>
            <style>
                #caracteristicas input[type="range"] {
                    margin-bottom: 5px;
                }
            </style>
            <div id="caracteristicas">
                <label for="Vigor">Vigor</label><br>
                <input id="vigor" type="range" min="0" max="100" oninput="document.getElementById('vigorValue').innerText = this.value;"><span id="vigorValue">50</span><br>
                <label for="Aguante">Aguante</label><br>
                <input id="aguante" type="range" min="0" max="100" oninput="document.getElementById('aguanteValue').innerText = this.value;"><span id="aguanteValue">50</span><br>
                <label for="Fuerza">Fuerza</label><br>
                <input id="fuerza" type="range" min="0" max="100" oninput="document.getElementById('fuerzaValue').innerText = this.value;"><span id="fuerzaValue">50</span><br>
                <label for="Destreza">Destreza</label><br>
                <input id="destreza" type="range" min="0" max="100" oninput="document.getElementById('destrezaValue').innerText = this.value;"><span id="destrezaValue">50</span><br>
                <label for="Inteligencia">Inteligencia</label><br>
                <input id="inteligencia" type="range" min="0" max="100" oninput="document.getElementById('inteligenciaValue').innerText = this.value;"><span id="inteligenciaValue">50</span><br>
                <label for="Arcano">Arcano</label><br>
                <input id="arcano" type="range" min="0" max="100" oninput="document.getElementById('arcanoValue').innerText = this.value;"><span id="arcanoValue">50</span><br>
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
        </div>
    </div>


</body>

</html>