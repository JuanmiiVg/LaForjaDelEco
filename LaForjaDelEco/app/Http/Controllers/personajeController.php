<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personaje;
use App\Models\caracteristicas;

class personajeController extends Controller
{
    public function index($id){
        $personaje = Personaje::find($id);
        $caracteristicas = Caracteristicas::find($id);
        return view ("inventario",compact("personaje","caracteristicas"));
    }
}
