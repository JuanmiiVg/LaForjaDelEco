<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Forja Del Eco</title>
    <link href="https://fonts.googleapis.com/css2?family=Uncial+Antiqua&display=swap" rel="stylesheet">
    <style>
        /* Fuente medieval */
        body {
            font-family: 'Uncial Antiqua', cursive;
            color: #D4AF37;
            /* Dorado medieval */
        }

        /* Background video */
        .video-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            object-fit: cover;
            z-index: -1;
        }

        /* Contenedor de la puerta */
        .door-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            overflow: hidden;
            perspective: 1000px;
            background-color: black;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Puertas */
        .door {
            position: absolute;
            width: 50%;
            height: 100%;
            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.7);
            transform-origin: center;
            top: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .door.left {
            left: 0;
            background: url('{{ asset("img/medievaldoorizq.jpg") }}') center/cover no-repeat;
        }

        .door.right {
            right: 0;
            background: url('{{ asset("img/medievaldoorder.jpg") }}') center/cover no-repeat;
        }

        /* Animación de apertura */
        @keyframes openDoorLeft {
            0% {
                transform: rotateY(0deg);
            }

            100% {
                transform: rotateY(60deg);
            }
        }

        @keyframes openDoorRight {
            0% {
                transform: rotateY(0deg);
            }

            100% {
                transform: rotateY(-60deg);
            }
        }

        .open .left {
            animation: openDoorLeft 1s ease forwards;
        }

        .open .right {
            animation: openDoorRight 1s ease forwards;
        }

        /* Eliminar fondo después de abrirse */
        .open {
            background-color: transparent;
        }

        /* Contenido */
        .content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            padding: 20px;
            opacity: 0;
            transition: opacity 1s ease-in-out;
            color: #D4AF37;
            /* Dorado medieval */
            z-index: 1;
        }

        .content h1 {
            font-size: 3rem;
            /* Texto más grande */
        }

        .content p {
            font-size: 1.8rem;
            /* Texto más grande */
        }

        .show-content {
            opacity: 1;
        }

        /* Botones medievales */
        .boton-general {
            background: #8B0000;
            color: gold;
            font-size: 1.5rem;
            /* Botones más grandes */
            cursor: pointer;
            transition: background 0.3s ease;
            font-weight: bold;
            border: 3px solid gold;
            padding: 15px 30px;
            /* Botones más grandes */
            border-radius: 5px;
            font-family: 'Uncial Antiqua', cursive;
            text-decoration: none;
            display: inline-block;
            margin: 15px;
        }

        .boton-general:hover {
            background: #A52A2A;
        }
    </style>
</head>

<body>
    <video class="video-background" autoplay muted loop>
        <source src="{{ asset('video/medievalcorridor.webm') }}" type="video/webm">
    </video>

    <div class="door-container" id="doorContainer">
        <div class="door left"></div>
        <div class="door right"></div>z
    </div>

    <div class="content" id="content">
        <h1>Bienvenido a la Forja Del Eco</h1>
        <p>Elige tu camino, viajero.</p>

        <form action="{{ route('register') }}" method="get">
            <button type="submit" class="boton-general">Registrarse</button>
        </form>



        <form action="{{ route('login') }}" method="get">
            <button type="submit" class="boton-general">Iniciar Sesión</button>
        </form>
    </div>

    <!-- Sonidos -->
    <audio id="doorSound">
        <source src="{{ asset('sound/puertaabriendose.mp3') }}" type="audio/mpeg">
    </audio>

    <audio id="ambientSound" loop>
        <source src="{{ asset('sound/musicfondo.mp3') }}" type="audio/mpeg">
    </audio>

    <script>
        setTimeout(() => {
            const doorContainer = document.getElementById('doorContainer');
            const content = document.getElementById('content');
            const doorSound = document.getElementById('doorSound');
            const ambientSound = document.getElementById('ambientSound');

            // Reproducir sonido de apertura de puertas
            doorSound.play();

            doorContainer.classList.add('open');

            setTimeout(() => {
                content.classList.add('show-content');
                // Iniciar sonido ambiental
                ambientSound.volume = 0.5; // Ajusta el volumen si es necesario
                ambientSound.play();
            }, 1000); // Ajusta este tiempo si es necesario
        }, 3000);
    </script>
</body>

</html>