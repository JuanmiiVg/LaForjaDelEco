<style>
    @import url('https://fonts.googleapis.com/css2?family=Uncial+Antiqua&display=swap');
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
    /* Estilo general del contenedor */
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

    /* Tarjeta del formulario con efecto medieval */
    .form-card {
        background: rgba(255, 239, 191, 0.9);
        border-radius: 15px;
        padding: 30px;
        width: 400px;
        text-align: center;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
        font-family: 'Uncial Antiqua', cursive;
        border: 4px solid #8B4513;
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

    .github-btn {
        background: #333;
        color: white;
        border: 3px solid gold;
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

<x-guest-layout>
    <div class="contenedor-formulario">
        <form action="{{ route('welcome') }}" method="get">
            @csrf


            <!-- Email -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Recordarme -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded text-indigo-600" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                @endif

                <x-primary-button class="ms-3">
                    {{ __('Log in') }}
                </x-primary-button>
                <a href="{{ route('github.login') }}" class="text-white bg-[#24292F] hover:bg-[#24292F]/90 focus:ring-4 focus:outline-none focus:ring-[#24292F]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-500 dark:hover:bg-[#050708]/30 me-2 mb-2">
                <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z" clip-rule="evenodd"/>
                </svg>
                Sign in with Github
                </a>
            </div>
            <button class="bVolver" type="submit">volver</button>
        </form>
        <div class="form-card">
            <h2>Selecciona tu tipo de cuenta</h2>
            <select id="tipo" onchange="mostrarFormulario()">
                <option value="">Seleccione una opción</option>
                <option value="usuario">Usuario</option>
                <option value="master">Master</option>
            </select>

            <div id="usuario" class="formulario" style="display: none;">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Contraseña" required>
                    <button class="boton-general" type="submit">Iniciar Sesión</button>
                </form>
                <a href="{{ route('github.login') }}" class="github-btn">Iniciar sesión con GitHub</a>
            </div>

            <div id="master" class="formulario" style="display: none;">
                <form method="POST" action="{{ route('loginM') }}">
                    @csrf
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Contraseña" required>
                    <button class="boton-general" type="submit">Iniciar Sesión</button>
                </form>
                <a href="{{ route('github.login') }}" class="github-btn">Iniciar sesión con GitHub</a>
            </div>
        </div>
    </div>
</x-guest-layout>