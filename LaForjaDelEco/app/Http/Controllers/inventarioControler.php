<?php

namespace App\Http\Controllers;

use App\Models\Personaje;
use App\Models\Arma;
use App\Models\User;
use App\Models\Pocion;
use App\Models\Material;
use App\Models\Ingrediente;

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
        $material = Material::findOrFail($idMat);
        $user = User::findOrFail($id);

        return view('DetalleMaterial', compact('user', 'material'));
    }

    public function DetalleIngrediente($id, $idIng)
    {
        $ingrediente = Ingrediente::findOrFail($idIng);
        $user = User::findOrFail($id);

        return view('DetalleIngrediente', compact('user', 'ingrediente'));
    }
}
