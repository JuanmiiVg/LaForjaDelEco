<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GithubController extends Controller
{
    public function redirectToGithub() {
        return Socialite::driver('github')->redirect();
    }

    public function handleGithubCallback() {
        $githubUser = Socialite::driver('github')->user();

        $user = User::firstOrCreate(
            ['email' => $githubUser->email],
            [
                'nombrePersonaje' => $githubUser->name ?? $githubUser->nickname,
                'password' => bcrypt(uniqid()), 
                'master_id' => 1,
                'role' => 'user',
            ]
        );

        Auth::login($user);
        return redirect()->route('user.index', ['id' => $user->id]);
    }
}