<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Master;
use Illuminate\Support\Facades\Hash;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {


        // Authenticate the user
        $request->authenticate();

        // Regenerate the session
        $request->session()->regenerate();

        // Get the user by email
        $user = User::where('email', $request->input('email'))->first();

        // Check if user exists and get the ID
        if ($user) {
            $userId = $user->id;


            // Redirect to user.index with user ID
            return redirect()->route('user.index', ['id' => $userId]);
        } else {
            // Handle the case where the user is not found
            return redirect()->route('login')->withErrors(['email' => 'User not found']);
        }
    }


    public function storeMaster(LoginRequest $request)
    {
        // Get the master by email
        $master = Master::where('email', $request->input('email'))->first();

        // Check if master exists and if the password is correct
        if ($master && Hash::check($request->input('password'), $master->password)) {
            $masterId = $master->id;
            // Redirect to master.index with master ID
            return redirect()->route('master.index', ['id' => $masterId]);
        } else {
            // Handle the case where the master is not found or password is incorrect
            return redirect()->route('login')->withErrors(['email' => 'User not found or password incorrect']);
        }
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
