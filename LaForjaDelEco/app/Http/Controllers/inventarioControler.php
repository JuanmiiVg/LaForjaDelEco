<?php

namespace App\Http\Controllers;

use App\Models\Personaje;
use App\Models\Arma;
use App\Models\User;

class inventarioControler extends Controller
{
    public function DetalleArma($id, $idArma)
    {
        $arma = Arma::findOrFail($idArma);
        $user = User::findOrFail($id);

        return view('DetalleArma', compact('user', 'arma'));
    }
}
