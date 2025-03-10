<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatBot Medieval</title>
    <link rel="stylesheet" href="{{ asset('css/inventario.css') }}">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    <style>
        /* Fuentes medievales */
        @import url('https://fonts.googleapis.com/css2?family=MedievalSharp&display=swap');

        body {
            font-family: 'MedievalSharp', cursive;
        }

        /* Estilo para el chatbot en la ventana lateral */
        #chatbot {
            position: fixed;
            right: 20px;
            bottom: 20px;
            width: 320px;
            background-color: #f4e1c1;
            /* Fondo claro tipo pergamino */
            border: 3px solid #8a4b2a;
            /* Borde marrón oscuro */
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            padding: 15px;
            display: none;
            /* Ocultarlo por defecto */
            font-size: 14px;
        }

        #chatbot h5 {
            font-size: 1.4em;
            text-align: center;
            color: #8a4b2a;
            font-weight: bold;
            margin-bottom: 15px;
        }

        #chatbot .form-group {
            margin-bottom: 15px;
        }

        #chatbot button {
            width: 100%;
            background-color: #8a4b2a;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            font-weight: bold;
        }

        #chatbot button:hover {
            background-color: #6f3e1f;
        }

        /* Estilo para el área de respuesta */
        #response {
            margin-top: 20px;
            padding: 10px;
            min-height: 50px;
            max-height: 200px;
            /* Máxima altura */
            overflow-y: auto;
            /* Habilita el desplazamiento vertical */
            background-color: #fff8e1;
            /* Fondo tipo pergamino */
            border: 2px solid #8a4b2a;
            border-radius: 8px;
        }

        #response h3 {
            color: #333;
            font-size: 1.2em;
        }

        #response strong {
            color: #d9534f;
        }

        #response ul {
            padding-left: 20px;
        }

        #response li {
            margin-bottom: 5px;
        }

        /* Estilo para el botón flotante de abrir el chat */
        #chatbot-toggle {
            position: fixed;
            right: 20px;
            bottom: 20px;
            background-color: #8a4b2a;
            color: white;
            padding: 15px 20px;
            border-radius: 50%;
            font-size: 30px;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        #chatbot-toggle:hover {
            background-color: #6f3e1f;
        }
    </style>
</head>

<body>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="botonL" type="submit">Cerrar Sesión</button>
    </form>
    <div class="grid-container">
        <div class="izquierda">
            <div class="perfil">
                @if($master->imagen)
                <img src="{{ asset('storage/' . $user->imagen) }}" height="250" alt="Imagen del Personaje"><br>
                @else
                <img src="{{ asset('Img/9ceb07252b117d785feb84c1c3d589b7-removebg-preview.png') }}" height="250" alt="Imagen por Defecto"><br>
                @endif
                <label for="perfil">{{ $master->nombreMaster }}</label>
                <p>Codigo de Patida: {{$master->codigo}}</p>
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
                    <form action="{{route('Item.add',['id' => $master->id, 'idUse' => $user->id])}}" method="post">
                        @csrf
                        <button type="submit" class="boton">&nbsp;&nbsp;&nbsp;&nbsp;Dar&nbsp;&nbsp;&nbsp;&nbsp;</button>
                    </form>
                    <form action="{{route('master.quitar',['id' => $master->id, 'idUse' => $user->id])}}" method="post">
                        @csrf
                        <button type="submit" class="boton">&nbsp;&nbsp;&nbsp;Quitar&nbsp;&nbsp;&nbsp;</button>
                    </form>
                </div>
                <div class="botones">
                    <form action="{{route('master.edit',['id' => $master->id, 'idUse' => $user->id])}}" method="get">
                        @csrf
                        <button type="submit" class="boton">&nbsp;&nbsp;Editar&nbsp;&nbsp;</button>
                    </form>
                    <form action="{{route('user.eliminar', ['id' => $master->id, 'idUse' => $user->id])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="boton">&nbsp;Eliminar&nbsp;</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Ventana del chatbot -->
    <div id="chatbot">
        <h5>ChatBot Medieval</h5>
        <div class="form-group">
            <input type="text" class="form-control" id="userInput" placeholder="Enter your question" />
        </div>
        <button class="btn btn-success" onclick="sendMessage()">Ask!</button>
        <div id="response"></div>
    </div>

    <!-- Botón para abrir el chatbot -->
    <button id="chatbot-toggle" onclick="toggleChatbot()">🗨️</button>

    <script>
        // Función para mostrar/ocultar el chatbot
        function toggleChatbot() {
            const chatbot = document.getElementById('chatbot');
            chatbot.style.display = chatbot.style.display === 'block' ? 'none' : 'block';
        }

        async function sendMessage() {
            const input = document.getElementById('userInput').value;
            const responseDiv = document.getElementById('response');
            if (!input) {
                responseDiv.innerHTML = 'Please enter a message.';
                return;
            }
            responseDiv.innerHTML = 'Loading...';
            try {
                const response = await fetch(
                    'https://openrouter.ai/api/v1/chat/completions', {
                        method: 'POST',
                        headers: {
                            Authorization: 'Bearer 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',
                            'HTTP-Referer': 'https://www.sitename.com',
                            'X-Title': 'SiteName',
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            model: 'deepseek/deepseek-r1:free',
                            messages: [{
                                role: 'user',
                                content: input
                            }],
                        }),
                    },
                );
                const data = await response.json();
                console.log(data);
                const markdownText =
                    data.choices?.[0]?.message?.content || 'No response received.';
                responseDiv.innerHTML = marked.parse(markdownText);
            } catch (error) {
                responseDiv.innerHTML = 'Error: ' + error.message;
            }
        }
    </script>
</body>

</html>