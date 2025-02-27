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
            <div class="perfil">
                @if($user->imagen)
                    <img src="{{ asset('storage/' . $user->imagen) }}" height="250" alt="Imagen del Personaje"><br>
                @else
                    <img src="{{ asset('Img/9ceb07252b117d785feb84c1c3d589b7-removebg-preview.png') }}" height="250" alt="Imagen por Defecto"><br>
                @endif
                <label for="perfil">{{ $user->nombrePersonaje }}</label>
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

                <form action="{{ route('caracteristicas.edit', ['id' => $user->id, 'idC' => $caracteristicas->id]) }}" method="GET">
                    @csrf
                    <button class="botonC" type="submit"></button>
                </form>
            </div>
            
        </div>
        <div class="derecha">
            @foreach($armas as $arma)
            <div class="cuadrado">
                <img class="item" src="{{ asset('Img/ca6ce0c083114292bb032634564fa849-removebg-preview.png') }}" alt="">
                <p>{{$arma -> nombre}}</p>
                <div class="botones">
                    <form action="{{ route('arma.eliminar', ['id' => $user->id, 'idArm' => $arma->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="boton" type="submit">&nbsp;&nbsp;&nbsp;Soltar&nbsp;&nbsp;&nbsp;</button>
                    </form>
                    <a class="boton">&nbsp;Detalles&nbsp;</a>
                </div>
            </div>
            @endforeach
            @foreach($pociones as $pocion)
            <div class="cuadrado">
                <img class="item" src="{{ asset('Img/ca6ce0c083114292bb032634564fa849-removebg-preview.png') }}" alt="">
                <p>{{$pocion -> nombre}}</p>
                <div class="botones">
                    <form action="{{ route('pocion.eliminar', ['id' => $user->id, 'idPoc' => $pocion->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="boton" type="submit">&nbsp;&nbsp;&nbsp;Soltar&nbsp;&nbsp;&nbsp;</button>
                    </form>
                    <a class="boton">&nbsp;Detalles&nbsp;</a>
                </div>
            </div>
            @endforeach
            @foreach($materiales as $material)
            <div class="cuadrado">
                <img class="item" src="{{ asset('Img/ca6ce0c083114292bb032634564fa849-removebg-preview.png') }}" alt="">
                <p>{{$material -> nombre}}</p>
                <div class="botones">
                    <form action="{{ route('material.eliminar', ['id' => $user->id, 'idMat' => $material->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="boton" type="submit">&nbsp;&nbsp;&nbsp;Soltar&nbsp;&nbsp;&nbsp;</button>
                    </form>
                    <a class="boton">&nbsp;Detalles&nbsp;</a>
                </div>
            </div>
            @endforeach
            @foreach($ingredientes as $ingrediente)
            <div class="cuadrado">
                <img class="item" src="{{ asset('Img/ca6ce0c083114292bb032634564fa849-removebg-preview.png') }}" alt="">
                <p>{{$ingrediente -> nombre}}</p>
                <div class="botones">
                    <form action="{{ route('ingrediente.eliminar', ['id' => $user->id, 'idIng' => $ingrediente->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="boton" type="submit">&nbsp;&nbsp;&nbsp;Soltar&nbsp;&nbsp;&nbsp;</button>
                    </form>
                    <a class="boton">&nbsp;Detalles&nbsp;</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>

</html>