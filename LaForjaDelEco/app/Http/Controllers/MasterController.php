<?php

namespace App\Http\Controllers;

use App\Models\master;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Arma;
use App\Models\Pocion;
use App\Models\Material;
use App\Models\Ingrediente;
use App\Models\Caracteristicas;
use App\Models\Inventario;
use App\Models\inventario_has_arma;
use App\Models\inventario_has_ingrediente;
use App\Models\inventario_has_material;
use App\Models\inventario_has_pocion;
use Illuminate\Support\Facades\Storage;

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

    public function addArma(Request $request, $id, $idUse)
    {
        // Crear el objeto Arma
        $arma = new Arma();
        $arma->nombre = $request->nombre;

        // Guardar el arma para obtener su ID
        $arma->save();

        // Crear la carpeta con el ID del arma
        $carpetaArma = 'imagenes/armas/' . $arma->id;
        Storage::disk('public')->makeDirectory($carpetaArma);

        // Guardar la nueva imagen
        $path = request()->file('imagen')->store($carpetaArma, 'public');
        $arma->imagen = $path;

        $arma->categoria = $request->categoria;
        $arma->tamano = $request->tamano;
        $arma->dano = $request->dano;
        $arma->peso = $request->peso;

        // Actualizar el arma con la ruta de la imagen
        $arma->save();

        // Buscar al usuario por ID
        $user = User::find($idUse);
        $idInv = $user->inventario_id;
        // Agregar el arma al inventario del usuario
        inventario_has_arma::create([
            'inventario_id' => $idInv,
            'arma_id' => $arma->id
        ]);

        return redirect()->route('master.index', $id);
    }

    public function addPocion(Request $request, $id, $idUse)
    {
        // Crear el objeto Pocion
        $pocion = new Pocion();
        $pocion->nombre = $request->nombre;
        $pocion->duracion = $request->duracion;
        $pocion->tamano = 1;
        $pocion->efecto = $request->efectoPocion;
        $pocion->peso = $request->peso;

        // Guardar la poción para obtener su ID
        $pocion->save();

        // Crear la carpeta con el ID de la poción
        $carpetaPocion = 'imagenes/pociones/' . $pocion->id;
        Storage::disk('public')->makeDirectory($carpetaPocion);

        // Guardar la nueva imagen
        $path = request()->file('imagen')->store($carpetaPocion, 'public');
        $pocion->imagen = $path;

        // Actualizar la poción con la ruta de la imagen
        $pocion->save();

        // Buscar al usuario por ID
        $user = User::find($idUse);
        $idInv = $user->inventario_id;
        // Agregar la poción al inventario del usuario
        inventario_has_pocion::create([
            'inventario_id' => $idInv,
            'pocion_id' => $pocion->id
        ]);

        return redirect()->route('master.index', $id);
    }

    public function addMaterial(Request $request, $id, $idUse)
    {
        // Crear el objeto Material
        $material = new Material();
        $material->nombre = $request->nombre;
        $material->peso = $request->peso;

        // Guardar el material para obtener su ID
        $material->save();

        // Crear la carpeta con el ID del material
        $carpetaMaterial = 'imagenes/materiales/' . $material->id;
        Storage::disk('public')->makeDirectory($carpetaMaterial);

        // Guardar la nueva imagen
        $path = request()->file('imagen')->store($carpetaMaterial, 'public');
        $material->imagen = $path;

        // Actualizar el material con la ruta de la imagen
        $material->save();

        // Buscar al usuario por ID
        $user = User::find($idUse);
        $idInv = $user->inventario_id;
        // Agregar el material al inventario del usuario
        inventario_has_material::create([
            'inventario_id' => $idInv,
            'material_id' => $material->id
        ]);

        return redirect()->route('master.index', $id);
    }

    public function addIngrediente(Request $request, $id, $idUse)
    {
        // Crear el objeto Ingrediente
        $ingrediente = new Ingrediente();
        $ingrediente->nombre = $request->nombre;
        $ingrediente->peso = $request->peso;

        // Guardar el ingrediente para obtener su ID
        $ingrediente->save();

        // Crear la carpeta con el ID del ingrediente
        $carpetaIngrediente = 'imagenes/ingredientes/' . $ingrediente->id;
        Storage::disk('public')->makeDirectory($carpetaIngrediente);

        // Guardar la nueva imagen
        $path = request()->file('imagen')->store($carpetaIngrediente, 'public');
        $ingrediente->imagen = $path;

        // Actualizar el ingrediente con la ruta de la imagen
        $ingrediente->save();

        // Buscar al usuario por ID
        $user = User::find($idUse);
        $idInv = $user->inventario_id;
        // Agregar el ingrediente al inventario del usuario
        inventario_has_ingrediente::create([
            'inventario_id' => $idInv,
            'ingrediente_id' => $ingrediente->id
        ]);

        return redirect()->route('master.index', $id);
    }

    public function quitar($id, $idUse)
    {
        $user = User::find($idUse);
        $master = Master::find($id);

        $inventario = Inventario::findOrFail($user->inventario_id);

        // Obtengo los registros de objetos asociados al inventario
        $pociones_datos = Inventario_Has_Pocion::where("inventario_id", $user->inventario_id)->get();
        $ingredientes_datos = Inventario_Has_Ingrediente::where("inventario_id", $user->inventario_id)->get();
        $armas_datos = Inventario_Has_Arma::where("inventario_id", $user->inventario_id)->get();
        $materiales_datos = Inventario_Has_Material::where("inventario_id", $user->inventario_id)->get();

        // Obtengo los objetos en sí
        $pociones = Pocion::whereIn("id", $pociones_datos->pluck("pocion_id"))->get();
        $ingredientes = Ingrediente::whereIn("id", $ingredientes_datos->pluck("ingrediente_id"))->get();
        $armas = Arma::whereIn("id", $armas_datos->pluck("arma_id"))->get();
        $materiales = Material::whereIn("id", $materiales_datos->pluck("material_id"))->get();

        return view("quitar", compact("user", "master", "pociones", "ingredientes", "armas", "materiales"));
    }

    public function eliminar(Request $request, $id)
    {
        $tipoItem = $request->input('tipo_item');
        list($tipo, $itemId) = explode('_', $tipoItem);

        switch ($tipo) {
            case 'pocion':
                $pocion = Pocion::findOrFail($itemId);
                $this->eliminarImagen($pocion->imagen);
                $pocion->delete();
                inventario_has_pocion::where('pocion_id', $itemId)->delete();
                break;
            case 'arma':
                $arma = Arma::findOrFail($itemId);
                $this->eliminarImagen($arma->imagen);
                $arma->delete();
                inventario_has_arma::where('arma_id', $itemId)->delete();
                break;
            case 'ingrediente':
                $ingrediente = Ingrediente::findOrFail($itemId);
                $this->eliminarImagen($ingrediente->imagen);
                $ingrediente->delete();
                inventario_has_ingrediente::where('ingrediente_id', $itemId)->delete();
                break;
            case 'material':
                $material = Material::findOrFail($itemId);
                $this->eliminarImagen($material->imagen);
                $material->delete();
                inventario_has_material::where('material_id', $itemId)->delete();
                break;
            default:
                return redirect()->route('master.index', $id);
        }

        return redirect()->route('master.index', $id);
    }

    private function eliminarImagen($path)
    {
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }

    public function editarUser($id, $idUse)
    {
        $user = User::findOrFail($idUse);
        $master = master::findOrFail($id);
        $caracteristicas = Caracteristicas::findOrFail($user->caracteristicas_id);
        return view("caracteristicasEdit", compact("user", "master", "caracteristicas"));
    }

    public function updateUser(Request $request, $id, $idUse)
    {
        $user = User::findOrFail($idUse);
        $caracteristicas = Caracteristicas::findOrFail($user->caracteristicas_id);
        $caracteristicas->vigor = $request->vigor;
        $caracteristicas->aguante = $request->aguante;
        $caracteristicas->fuerza = $request->fuerza;
        $caracteristicas->destreza = $request->destreza;
        $caracteristicas->inteligencia = $request->inteligencia;
        $caracteristicas->arcano = $request->arcano;
        $caracteristicas->save();
        return redirect()->route("master.index", $id);
    }
}
