<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class ProviderController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $socialUser = Socialite::driver($provider)->user();

        // Buscar si el usuario ya existe en la base de datos
        $user = User::where('provider_id', $socialUser->id)->first();

        if (!$user) {
            // Si no existe, crearlo
            $user = User::create([
                'name' => $socialUser->name ?? $socialUser->nickname,
                'email' => $socialUser->email,
                'provider' => $provider,
                'provider_id' => $socialUser->id,
                'avatar' => $socialUser->avatar,
                'password' => bcrypt(uniqid()), // Contraseña aleatoria
            ]);
        }

        // Iniciar sesión
        Auth::login($user);

        // Redirigir al usuario a la página deseada
        return redirect()->route('dashboard');
    }
}
