<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="nombrePersonaje" :value="__('Nombre de Personaje')" />
            <x-text-input id="nombrePersonaje" class="block mt-1 w-full" type="text" name="nombrePersonaje" :value="old('nombrePersonaje')" required autofocus autocomplete="nombrePersonaje" />
            <x-input-error :messages="$errors->get('nombrePersonaje')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <!-- Master Code -->
        <div class="mt-4">
            <x-input-label for="codigoMaster" :value="__('Código del Master')" />
            <x-text-input id="master_id" class="block mt-1 w-full" type="number" name="master_id" :value="old('master_id')" required autocomplete="master_id" />
            <x-input-error :messages="$errors->get('master_id')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input id="password" class="block mt-1 w-full"
                type="password"
                name="password"
                required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirar Contraseña')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('¿Ya tienes un personaje?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('REGISTRARSE') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>