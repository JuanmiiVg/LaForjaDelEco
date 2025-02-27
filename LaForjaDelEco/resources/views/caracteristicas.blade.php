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
                <label for="vigor">Vigor</label>
                <input type="range" id="vigor" name="vigor" min="0" max="100" value="0" oninput="updateValue('vigorValue', this.value)"><br>
                <span id="vigorValue">0</span><br>
                @endif

                @if(is_null($caracteristicas->aguante))
                <label for="aguante">Aguante</label>
                <input type="range" id="aguante" name="aguante" min="0" max="100" value="0" oninput="updateValue('aguanteValue', this.value)"><br>
                <span id="aguanteValue">0</span><br>
                @endif

                @if(is_null($caracteristicas->fuerza))
                <label for="fuerza">Fuerza</label>
                <input type="range" id="fuerza" name="fuerza" min="0" max="100" value="0" oninput="updateValue('fuerzaValue', this.value)"><br>
                <span id="fuerzaValue">0</span><br>
                @endif

                @if(is_null($caracteristicas->destreza))
                <label for="destreza">Destreza</label>
                <input type="range" id="destreza" name="destreza" min="0" max="100" value="0" oninput="updateValue('destrezaValue', this.value)"><br>
                <span id="destrezaValue">0</span><br>
                @endif

                @if(is_null($caracteristicas->inteligencia))
                <label for="inteligencia">Inteligencia</label>
                <input type="range" id="inteligencia" name="inteligencia" min="0" max="100" value="0" oninput="updateValue('inteligenciaValue', this.value)"><br>
                <span id="inteligenciaValue">0</span><br>
                @endif

                @if(is_null($caracteristicas->arcano))
                <label for="arcano">Arcano</label>
                <input type="range" id="arcano" name="arcano" min="0" max="100" value="0" oninput="updateValue('arcanoValue', this.value)"><br>
                <span id="arcanoValue">0</span><br>
                @endif

                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen del Personaje</label>
                    <input type="file" name="imagen" id="imagen" class="form-control">
                </div>

                <input type="submit" class="botonC">
            </form>
        </div>
    </div>

    <script>
        function updateValue(id, value) {
            document.getElementById(id).innerText = value;
        }
    </script>
</body>

</html>