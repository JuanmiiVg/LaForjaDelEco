<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario para Añadir</title>
    <link href="{{ asset('css/inventario.css') }}" rel="stylesheet">
    <link href="{{ asset('css/anadir.css') }}" rel="stylesheet">
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
    <div class="paginaForms">
        <select id="tipo" onchange="mostrarFormulario()">
            <option value="">Seleccione una opción</option>
            <option value="arma">Arma</option>
            <option value="pocion">Poción</option>
            <option value="ingrediente">Ingrediente</option>
            <option value="material">Material</option>
        </select>

        <div id="arma" class="formulario">
            <h2>Formulario para Arma</h2>
            <form method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Campos específicos para Arma -->
                <label for="nombre">Nombre del Arma:</label>
                <input type="text" id="nombre" name="nombre"><br>
                <label for="categoria">Categoria de Arma:</label>
                <input type="text" id="categoria" name="categoria"><br>
                <label for="tamano">Agarre</label>
                <input type="radio" name="tamano" id="tamano" value="1">A una mano 
                <input type="radio" name="tamano" id="tamano" value="2">A dos manos<br>
                <label for="dano">Daño:</label>
                <input type="number" id="dano" name="dano"><br>
                <label for="peso">Peso:</label>
                <input type="number" id="peso" name="peso"><br>
                <label for="imagen">Imagen del Arma:</label>
                <input type="file" id="imagen" name="imagen"><br>
                <button type="submit">Enviar</button>
            </form>
        </div>

        <div id="pocion" class="formulario">
            <h2>Formulario para Poción</h2>
            <form method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Campos específicos para Poción -->
                <label for="nombrePocion">Nombre de la Poción:</label>
                <input type="text" id="nombrePocion" name="nombre"><br>
                <label for="duracion">Duración de Poción:</label>
                <input type="number" id="duracion" placeholder="En minutos" name="duracion"><br>
                <label for="efectoPocion">Efecto de la Poción:</label>
                <input type="text" id="efectoPocion" name="efectoPocion"><br>
                <label for="peso">Peso de la Poción</label>
                <input type="number" id="peso" name="peso"><br>
                <label for="imagen">Imagen de la Poción</label>
                <input type="file" id="imagen" name="imagen"><br>
                <button type="submit">Enviar</button>
            </form>
        </div>

        <div id="ingrediente" class="formulario">
            <h2>Formulario para Ingrediente</h2>
            <form method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Campos específicos para Ingrediente -->
                <label for="nombreIngrediente">Nombre del Ingrediente:</label>
                <input type="text" id="nombreIngrediente" name="nombre"><br>
                <label for="peso">Peso del Ingrediente:</label>
                <input type="number" id="peso" name="peso"><br>
                <label for="imagen">Imagen del Ingrediente:</label>
                <input type="file" id="imagen" name="imagen"><br>
                <button type="submit">Enviar</button>
            </form>
        </div>

        <div id="material" class="formulario">
            <h2>Formulario para Material</h2>
            <form method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Campos específicos para Material -->
                <label for="nombre">Nombre del Material:</label>
                <input type="text" id="nombre" name="nombre"><br>
                <label for="peso">Peso de Material:</label>
                <input type="text" id="peso" name="peso"><br>
                <label for="imagen">Imagen del Material:</label>
                <input type="file" id="imagen" name="imagen"><br>
                <button type="submit">Enviar</button>
                <!-- Agrega más campos según sea necesario -->
            </form>
        </div>
    </div>
</body>

</html>