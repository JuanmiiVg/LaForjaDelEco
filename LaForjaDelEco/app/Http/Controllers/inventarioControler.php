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

    public function DetallePocion($id, $idPoc)
    {
        $pocion = Pocion::findOrFail($idPoc);
        $user = User::findOrFail($id);

        return view('DetallePocion', compact('user', 'pocion'));
    }

    public function DetalleMaterial($id, $idMat)
    {
        $material = Pocion::findOrFail($idMat);
        $user = User::findOrFail($id);

        return view('DetalleMaterial', compact('user', 'material'));
    }

    public function DetalleIngrediente($id, $idIng)
    {
        $material = Pocion::findOrFail($idIng);
        $user = User::findOrFail($id);

        return view('DetalleIngrediente', compact('user', 'ingrediente'));
    }
}
