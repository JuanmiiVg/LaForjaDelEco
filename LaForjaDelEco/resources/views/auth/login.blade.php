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
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Selector de tipo de usuario -->
    <select id="tipo" onchange="mostrarFormulario()">
        <option value="">Seleccione una opción</option>
        <option value="usuario">Usuario</option>
        <option value="master">Master</option>
    </select>

    <!-- Formulario Usuario -->
    <div id="usuario" class="formulario" style="display: none;">
        <form method="POST" action="{{ route('login') }}">
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
                <a href="{{ route('github.login') }}" class="transition-transform duration-300 hover:scale-110">
                    <img src="https://github.githubassets.com/images/modules/logos_page/GitHub-Mark.png" alt="GitHub Logo" class="w-5 h-5">
                </a>
            </div>
        </form>
    </div>

    <!-- Formulario Master -->
    <div id="master" class="formulario" style="display: none;">

        <form method="POST" action="{{ route('loginM') }}">
            @csrf
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <x-primary-button class="mt-4">
                {{ __('Log in') }}
            </x-primary-button>
        </form>
    </div>
</x-guest-layout>