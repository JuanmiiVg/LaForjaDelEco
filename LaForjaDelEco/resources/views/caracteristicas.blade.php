<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Características</title>
    <link href="{{ asset('css/inventario.css') }}" rel="stylesheet">
</head>

<body>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="pagina">
        <div id="caracteristicasEdit">
            <form id="caracteristicasForm" action="{{ route('caracteristicas.update', ['id' => $user->id, 'idC' => $caracteristicas->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                @if(is_null($caracteristicas->vigor))
                <h1>ASIGNA TUS CARACTERISTICAS</h1>
                <H3>(No pueden sumar mas de 125 )</H3>
                <span id="totalValue">0</span>
                <div class="rangeContainer">
                    <label for="vigor">Vigor</label>
                    <input type="range" id="vigor" name="vigor" min="0" max="100" value="0" oninput="updateValue('vigorValue', this.value)"><br>
                    <span id="vigorValue">0</span><br>
                </div>

                @endif

                @if(is_null($caracteristicas->aguante))
                <div class="rangeContainer">
                    <label for="aguante">Aguante</label>
                    <input type="range" id="aguante" name="aguante" min="0" max="100" value="0" oninput="updateValue('aguanteValue', this.value)"><br>
                    <span id="aguanteValue">0</span><br>
                </div>
                @endif

                @if(is_null($caracteristicas->fuerza))
                <div class="rangeContainer">
                    <label for="fuerza">Fuerza</label>
                    <input type="range" id="fuerza" name="fuerza" min="0" max="100" value="0" oninput="updateValue('fuerzaValue', this.value)"><br>
                    <span id="fuerzaValue">0</span><br>
                </div>
                @endif

                @if(is_null($caracteristicas->destreza))
                <div class="rangeContainer">
                    <label for="destreza">Destreza</label>
                    <input type="range" id="destreza" name="destreza" min="0" max="100" value="0" oninput="updateValue('destrezaValue', this.value)"><br>
                    <span id="destrezaValue">0</span><br>
                </div>
                @endif

                @if(is_null($caracteristicas->inteligencia))
                <div class="rangeContainer">
                    <label for="inteligencia">Inteligencia</label>
                    <input type="range" id="inteligencia" name="inteligencia" min="0" max="100" value="0" oninput="updateValue('inteligenciaValue', this.value)"><br>
                    <span id="inteligenciaValue">0</span><br>
                </div>
                @endif

                @if(is_null($caracteristicas->arcano))
                <div class="rangeContainer">
                    <label for="arcano">Arcano</label>
                    <input type="range" id="arcano" name="arcano" min="0" max="100" value="0" oninput="updateValue('arcanoValue', this.value)"><br>
                    <span id="arcanoValue">0</span><br>
                </div>
                @endif

                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen del Personaje</label>
                    <input type="file" name="imagen" id="imagen" class="form-control custom-file-input">
                </div>
                <style>
                    .botonC {
                        margin-top: 50px;
                    }
                </style>
                <input type="submit" class="botonC no-text">
            </form>
        </div>
    </div>

    <script>
        function updateValue(id, value) {
            document.getElementById(id).innerText = value;
            updateTotalValue();
        }

        function updateTotalValue() {
            const vigor = parseInt(document.getElementById('vigor').value) || 0;
            const aguante = parseInt(document.getElementById('aguante').value) || 0;
            const fuerza = parseInt(document.getElementById('fuerza').value) || 0;
            const destreza = parseInt(document.getElementById('destreza').value) || 0;
            const inteligencia = parseInt(document.getElementById('inteligencia').value) || 0;
            const arcano = parseInt(document.getElementById('arcano').value) || 0;

            const total = vigor + aguante + fuerza + destreza + inteligencia + arcano;
            const totalValueElement = document.getElementById('totalValue');
            totalValueElement.innerText = total;

            if (total > 125) {
                totalValueElement.style.color = 'red';
            } else {
                totalValueElement.style.color = 'black';
            }
        }

        document.addEventListener('DOMContentLoaded', updateTotalValue);
    </script>
</body>

</html>