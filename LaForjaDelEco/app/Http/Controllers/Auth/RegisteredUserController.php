<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use App\Models\Master;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombrePersonaje' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'codigo' => ['required', 'exists:' . Master::class . ',codigo'],
        ]);

        $master = Master::where('codigo', $request->codigo)->first();

        $user = User::create([
            'nombrePersonaje' => $request->nombrePersonaje,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'master_id' => $master->id,
        ]);

        event(new Registered($user));

        // Auth::login($user);

        return redirect(route('welcome', absolute: false));
    }

    private function generateUniqueCodeId()
    {
        do {
            $master_id = Str::random(6);
        } while (Master::where('id', $master_id)->exists());

        return $master_id;
    }

    public function storeMaster(Request $request): RedirectResponse
    {
        $request->validate([
            'nombreMaster' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        
        $master = Master::create([
            'codigo' => $this->generateUniqueCodeId(),
            'nombreMaster' => $request->nombreMaster,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($master));

        return redirect(route('welcome', absolute: false));
    }
}
