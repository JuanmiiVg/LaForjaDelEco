<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://fonts.googleapis.com/css2?family=Uncial+Antiqua&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Uncial Antiqua', cursive;
            margin: 0;
            padding: 0;
        }

        .contenedor-formulario {
            background-image: url("{{ asset('img/medieval-castle-bridge-8taa2c6wt.jpg') }}");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-card {
            background: rgba(255, 239, 191, 0.9);
            border-radius: 15px;
            padding: 50px;
            width: 400px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
            font-family: 'Uncial Antiqua', cursive;
            border: 4px solid #8B4513;
        }

        .form-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 106%;
        }

        select,
        input,
        .boton-general {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 2px solid #8B4513;
            font-size: 16px;
            font-family: 'Uncial Antiqua', cursive;
            background: rgba(255, 239, 191, 0.8);
        }

        .boton-general {
            background: #8B0000;
            color: gold;
            font-size: 18px;
            cursor: pointer;
            transition: background 0.3s ease;
            font-weight: bold;
            border: 3px solid gold;
        }

        .boton-general:hover {
            background: #A52A2A;
        }

        .formulario {
            display: none;
            width: 100%;
        }

        .bVolver {
            position: fixed;
            top: 0;
            right: 0;
            display: inline-block;
            padding: 10px 20px;
            background-image: url("../Img/descarga__5_-removebg-preview.png");
            background-size: cover;
            background-position: center;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s, box-shadow 0.3s;
            border: none;
            color: black;
            background-color: transparent;
            font-family: 'Uncial Antiqua', cursive;
        }
    </style>
    <script>
        function mostrarFormulario() {
            var seleccion = document.getElementById("tipo").value;
            var formularios = document.getElementsByClassName("formulario");
            for (var i = 0; i < formularios.length; i++) {
                formularios[i].style.display = "none";
            }
            if (seleccion) {
                document.getElementById(seleccion).style.display = "block";
            }
        }
    </script>
</head>

<body>
    <div class="contenedor-formulario">
        <form action="{{ route('welcome') }}" method="get">
            @csrf
            <button class="bVolver" type="submit">volver</button>
        </form>
        <div class="form-card">
            <h2>Selecciona tu tipo de cuenta</h2>

            <!-- Contenedor del select para mantener el espaciado uniforme -->
            <div class="form-container">
                <select id="tipo" onchange="mostrarFormulario()">
                    <option value="">Seleccione una opción</option>
                    <option value="usuario">Usuario</option>
                    <option value="master">Master</option>
                </select>
            </div>

            <div id="usuario" class="formulario form-container">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <input type="text" name="nombrePersonaje" placeholder="Nombre de Personaje" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="text" name="codigo" placeholder="Código de Partida" required>
                    <input type="password" name="password" placeholder="Contraseña" required>
                    <input type="password" name="password_confirmation" placeholder="Confirmar Contraseña" required>
                    <button class="boton-general" type="submit">REGISTRARSE</button>
                </form>
            </div>

            <div id="master" class="formulario form-container">
                <form method="POST" action="{{ route('registerM') }}">
                    @csrf
                    <input type="text" name="nombreMaster" placeholder="Nombre del Master" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Contraseña" required>
                    <input type="password" name="password_confirmation" placeholder="Confirmar Contraseña" required>
                    <button class="boton-general" type="submit">REGISTRARSE</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>