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
    <!-- Selector de tipo de usuario -->
    <div class="mb-6">
        <select id="tipo" onchange="mostrarFormulario()" class="w-full p-2 border rounded-md">
            <option value="">Seleccione una opción</option>
            <option value="usuario">Usuario</option>
            <option value="master">Master</option>
        </select>
    </div>

    <!-- Formulario Usuario -->
    <div id="usuario" class="formulario" style="display: none;">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Nombre de Personaje -->
            <div class="mb-4">
                <x-input-label for="nombrePersonaje" :value="__('Nombre de Personaje')" />
                <x-text-input id="nombrePersonaje" class="block mt-1 w-full" type="text" name="nombrePersonaje" :value="old('nombrePersonaje')" required autofocus autocomplete="nombrePersonaje" />
                <x-input-error :messages="$errors->get('nombrePersonaje')" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Código del Master -->
            <div class="mb-4">
                <x-input-label for="codigo" :value="__('Código de Partida')" />
                <x-text-input id="codigo" class="block mt-1 w-full" type="text" name="codigo" :value="old('codigo')" required autocomplete="codigo" />
                <x-input-error :messages="$errors->get('master_id')" class="mt-2" />
            </div>

            <!-- Contraseña -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Contraseña')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirmar Contraseña -->
            <div class="mb-4">
                <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('¿Ya tienes un personaje?') }}
                </a>

                <x-primary-button class="ms-4">
                    {{ __('REGISTRARSE') }}
                </x-primary-button>
            </div>
        </form>
    </div>

    <!-- Formulario Master -->
    <div id="master" class="formulario" style="display: none;">
        <form method="POST" action="{{ route('registerM') }}">
            @csrf

            <!-- Nombre del Master -->
            <div class="mb-4">
                <x-input-label for="nombreMaster" :value="__('Nombre del Master')" />
                <x-text-input id="nombreMaster" class="block mt-1 w-full" type="text" name="nombreMaster" :value="old('nombreMaster')" required autofocus autocomplete="nombreMaster" />
                <x-input-error :messages="$errors->get('nombreMaster')" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Contraseña -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Contraseña')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirmar Contraseña -->
            <div class="mb-4">
                <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('¿Ya tienes una cuenta?') }}
                </a>

                <x-primary-button class="ms-4">
                    {{ __('REGISTRARSE') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>