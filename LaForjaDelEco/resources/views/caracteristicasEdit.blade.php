<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Características</title>
    <link href="{{ asset('css/inventario.css') }}" rel="stylesheet">
    <style>
        .rangeContainer {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .rangeContainer label {
            width: 100px;
        }
        .rangeContainer input[type="range"] {
            flex-grow: 1;
            margin: 0 10px;
        }
        .rangeContainer button {
            margin-left: 10px;
        }
        .botonC {
            margin-top: 50px;
        }
        .label {
            margin-left: 50px;
        }
    </style>
</head>

<body>

    <div class="pagina">
        <div id="caracteristicasEdit">
            <form id="caracteristicasForm" action="{{ route('master.update', ['id' => $master->id, 'idUse' => $user->id]) }}" method="post">
                @csrf
                @method('patch')
                <h1>EDITA LAS CARACTERISTICAS DE:</h1>
                <h2>{{ $user->nombrePersonaje }}</h2>
                <div class="rangeContainer">
                    <label for="vigor" class="label">Vigor</label>
                    <input type="range" id="vigor" name="vigor" min="0" max="100" value="{{ $caracteristicas->vigor }}" oninput="updateValue('vigorValue', this.value)">
                    <span id="vigorValue">{{ $caracteristicas->vigor }}</span>
                    <button type="button" class="boton" onclick="incrementValue('vigor')">&nbsp;&nbsp;LVLup&nbsp;&nbsp;</button>
                </div>
                <div class="rangeContainer">
                    <label for="aguante" class="label">Aguante</label>
                    <input type="range" id="aguante" name="aguante" min="0" max="100" value="{{ $caracteristicas->aguante }}" oninput="updateValue('aguanteValue', this.value)">
                    <span id="aguanteValue">{{ $caracteristicas->aguante }}</span>
                    <button type="button" class="boton" onclick="incrementValue('aguante')">&nbsp;&nbsp;LVLup&nbsp;&nbsp;</button>
                </div>
                <div class="rangeContainer">
                    <label for="fuerza" class="label">Fuerza</label>
                    <input type="range" id="fuerza" name="fuerza" min="0" max="100" value="{{ $caracteristicas->fuerza }}" oninput="updateValue('fuerzaValue', this.value)">
                    <span id="fuerzaValue">{{ $caracteristicas->fuerza }}</span>
                    <button type="button" class="boton" onclick="incrementValue('fuerza')">&nbsp;&nbsp;LVLup&nbsp;&nbsp;</button>
                </div>
                <div class="rangeContainer">
                    <label for="destreza" class="label">Destreza</label>
                    <input type="range" id="destreza" name="destreza" min="0" max="100" value="{{ $caracteristicas->destreza }}" oninput="updateValue('destrezaValue', this.value)">
                    <span id="destrezaValue">{{ $caracteristicas->destreza }}</span>
                    <button type="button" class="boton" onclick="incrementValue('destreza')">&nbsp;&nbsp;LVLup&nbsp;&nbsp;</button>
                </div>
                <div class="rangeContainer">
                    <label for="inteligencia" class="label">Inteligencia</label>
                    <input type="range" id="inteligencia" name="inteligencia" min="0" max="100" value="{{ $caracteristicas->inteligencia }}" oninput="updateValue('inteligenciaValue', this.value)">
                    <span id="inteligenciaValue">{{ $caracteristicas->inteligencia }}</span>
                    <button type="button" class="boton" onclick="incrementValue('inteligencia')">&nbsp;&nbsp;LVLup&nbsp;&nbsp;</button>
                </div>
                <div class="rangeContainer">
                    <label for="arcano" class="label">Arcano</label>
                    <input type="range" id="arcano" name="arcano" min="0" max="100" value="{{ $caracteristicas->arcano }}" oninput="updateValue('arcanoValue', this.value)">
                    <span id="arcanoValue">{{ $caracteristicas->arcano }}</span>
                    <button type="button" class="boton" onclick="incrementValue('arcano')">&nbsp;&nbsp;LVLup&nbsp;&nbsp;</button>
                </div>
                <input type="submit" class="botonC no-text">
            </form>
        </div>
    </div>

    <script>
        function updateValue(id, value) {
            document.getElementById(id).innerText = value;
        }

        function incrementValue(id) {
            var rangeInput = document.getElementById(id);
            if (rangeInput.value < 100) {
                rangeInput.value = parseInt(rangeInput.value) + 1;
                updateValue(id + 'Value', rangeInput.value);
            }
        }
    </script>
</body>

</html>