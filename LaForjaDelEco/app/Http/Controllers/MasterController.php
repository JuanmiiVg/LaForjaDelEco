<?php

namespace App\Http\Controllers;

use App\Models\master;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Arma;
use App\Models\Pocion;
use App\Models\Material;
use App\Models\Ingrediente;
use App\Models\inventario_has_arma;
use App\Models\inventario_has_ingrediente;
use App\Models\inventario_has_material;
use App\Models\inventario_has_pocion;

class MasterController extends Controller
{
    public function index($id)
    {
        $master = master::findOrFail($id);
        $users = User::where("master_id", $id)->get();
        return view("master", compact("master", "users"));
    }
    public function deleteUser($id, $idUse)
    {
        $User = User::findOrFail($idUse);
        $User->delete();
        return redirect()->route("master.index", $id);
    }
    public function addItem($id, $idUse)
    {
        $user = User::findOrFail($idUse);
        $master = master::findOrFail($id);
        return view("anadir", compact("user", "master"));
    }

    public function addArma(Request $request, $idUse, $id)
    {
        // Crear el objeto Arma
        $arma = new Arma();
        $arma->nombre = $request->nombre;

        $carpetaArma = 'imagenes/armas/' . $arma->id;
        // Guardar la nueva imagen
        $path = request()->file('imagen')->store($carpetaArma, 'public');
        $arma->imagen = $path;

        $arma->categoria = $request->categoria;
        $arma->tamano = $request->tamano;
        $arma->dano = $request->dano;
        $arma->peso = $request->peso;
        $arma->save();



        // Buscar al usuario por ID
        $user = User::find($idUse);
        $idInv = $user->inventario_id;
        // Agregar el arma al inventario del usuario
        inventario_has_arma::create([
            'inventario_id' => $idInv,
            'arma_id' => $arma->id
        ]);


        return redirect()->route('master.index', ['id' => $id]);
    }

    public function addPocion(Request $request, $idUse, $id)
    {
        // Crear el objeto Pocion
        $pocion = new Pocion();
        $pocion->nombre = $request->nombre;
        $pocion->duracion = $request->duracion;
        $pocion->tamano = 1;
        $pocion->efecto = $request->efectoPocion;
        $pocion->peso = $request->peso;

        $carpetaPocion = 'imagenes/pociones/' . $pocion->id;
        // Guardar la nueva imagen
        $path = request()->file('imagen')->store($carpetaPocion, 'public');
        $pocion->imagen = $path;

        $pocion->save();

        // Buscar al usuario por ID
        $user = User::find($idUse);
        $idInv = $user->inventario_id;
        // Agregar la poción al inventario del usuario
        inventario_has_pocion::create([
            'inventario_id' => $idInv,
            'pocion_id' => $pocion->id
        ]);

        return redirect()->route('master.index', ['id' => $id]);
    }

    public function addMaterial(Request $request, $idUse, $id)
    {
        // Crear el objeto Material
        $material = new Material();
        $material->nombre = $request->nombre;
        $material->peso = $request->peso;

        $carpetaMaterial = 'imagenes/materiales/' . $material->id;
        // Guardar la nueva imagen
        $path = request()->file('imagen')->store($carpetaMaterial, 'public');
        $material->imagen = $path;

        $material->save();

        // Buscar al usuario por ID
        $user = User::find($idUse);
        $idInv = $user->inventario_id;
        // Agregar el material al inventario del usuario
        inventario_has_material::create([
            'inventario_id' => $idInv,
            'material_id' => $material->id
        ]);

        return redirect()->route('master.index', ['id' => $id]);
    }

    public function addIngrediente(Request $request, $idUse, $id)
    {
        // Crear el objeto Ingrediente
        $ingrediente = new Ingrediente();
        $ingrediente->nombre = $request->nombre;
        $ingrediente->peso = $request->peso;

        $carpetaIngrediente = 'imagenes/ingredientes/' . $ingrediente->id;
        // Guardar la nueva imagen
        $path = request()->file('imagen')->store($carpetaIngrediente, 'public');
        $ingrediente->imagen = $path;

        $ingrediente->save();

        // Buscar al usuario por ID
        $user = User::find($idUse);
        $idInv = $user->inventario_id;
        // Agregar el ingrediente al inventario del usuario
        inventario_has_ingrediente::create([
            'inventario_id' => $idInv,
            'ingrediente_id' => $ingrediente->id
        ]);

        return redirect()->route('master.index', ['id' => $id]);
    }
}
