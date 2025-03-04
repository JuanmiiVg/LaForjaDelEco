<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario para Quitar</title>
    <link href="{{ asset('css/inventario.css') }}" rel="stylesheet">
    <link href="{{ asset('css/anadir.css') }}" rel="stylesheet">
</head>

<body>
    <div class="paginaForms">
        <h4>¿Qué quieres eliminarle a {{ $user->nombrePersonaje }}?</h4>
        <form action="{{ route('master.eliminar', ['id' => $master->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <select id="quitar" name="tipo_item">
                <option value="">Seleccione una opción</option>
                @foreach($pociones as $pocion)
                    <option value="pocion_{{ $pocion->id }}">Poción: {{ $pocion->nombre }}</option>
                @endforeach
                @foreach($armas as $arma)
                    <option value="arma_{{ $arma->id }}">Arma: {{ $arma->nombre }}</option>
                @endforeach
                @foreach($ingredientes as $ingrediente)
                    <option value="ingrediente_{{ $ingrediente->id }}">Ingrediente: {{ $ingrediente->nombre }}</option>
                @endforeach
                @foreach($materiales as $material)
                    <option value="material_{{ $material->id }}">Material: {{ $material->nombre }}</option>
                @endforeach
            </select>
            <br>
            <button type="submit" class="boton">Eliminar</button>
        </form>
    </div>
</body>

</html>