<?php

namespace App\Http\Controllers;
use App\Models\Personaje;

class inventarioControler extends Controller
{
    

    public function mostrarInventario($id)
    {
        $personaje = Personaje::findOrFail($id);
        $inventario = $personaje->cargarInventario();
    
        return view('inventario', compact('personaje', 'inventario'));
    }
    
    
}
