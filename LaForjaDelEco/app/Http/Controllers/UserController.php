<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Caracteristicas;
use App\Models\Inventario;
use App\Models\Inventario_Has_Arma;
use App\Models\Inventario_Has_Ingrediente;
use App\Models\Inventario_Has_Material;
use App\Models\Inventario_Has_Pocion;
use App\Models\Arma;
use App\Models\Pocion;
use App\Models\Ingrediente;
use App\Models\Material;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index($id)
    {
        $user = user::findOrFail($id);
        $caracteristicas = Caracteristicas::findOrFail($user->caracteristicas_id);
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

        // Retorno la vista con los datos
        return view("inventario", compact("user", "caracteristicas", "inventario", "pociones", "ingredientes", "armas", "materiales"));
    }

    public function deleteArma($id, $idArm)
    {
        $arma = Arma::find($idArm);
        if ($arma) {
            // Eliminar la imagen del arma
            Storage::delete('public/armas/' . $arma->imagen);
            // Eliminar la carpeta del arma
            Storage::deleteDirectory('public/armas/' . $arma->id);

            Inventario_Has_Arma::where('arma_id', $idArm)->delete();
            $arma->delete();
        }
        return redirect()->route('user.index', ['id' => $id]);
    }

    public function deletePocion($id, $idPoc)
    {
        $pocion = Pocion::find($idPoc);
        if ($pocion) {
            // Eliminar la imagen de la poción
            Storage::delete('public/pociones/' . $pocion->imagen);
            // Eliminar la carpeta de la poción
            Storage::deleteDirectory('public/pociones/' . $pocion->id);

            Inventario_Has_Pocion::where('pocion_id', $idPoc)->delete();
            $pocion->delete();
        }

        return redirect()->route('user.index', ['id' => $id]);
    }

    public function deleteMaterial($id, $idMat)
    {
        $material = Material::find($idMat);
        if ($material) {
            // Eliminar la imagen del material
            Storage::delete('public/materiales/' . $material->imagen);
            // Eliminar la carpeta del material
            Storage::deleteDirectory('public/materiales/' . $material->id);

            Inventario_Has_Material::where('material_id', $idMat)->delete();
            $material->delete();
        }

        return redirect()->route('user.index', ['id' => $id]);
    }

    public function deleteIngrediente($id, $idIng)
    {
        $ingrediente = Ingrediente::find($idIng);
        if ($ingrediente) {
            // Eliminar la imagen del ingrediente
            Storage::delete('public/ingredientes/' . $ingrediente->imagen);
            // Eliminar la carpeta del ingrediente
            Storage::deleteDirectory('public/ingredientes/' . $ingrediente->id);

            Inventario_Has_Ingrediente::where('ingrediente_id', $idIng)->delete();
            $ingrediente->delete();
        }

        return redirect()->route('user.index', ['id' => $id]);
    }

    public function equiparArma($id, $idArm)
    {
        $user = User::find($id);
        $arma = Arma::find($idArm);
        if ($user && $arma) {
            if ($arma->tamano == 1) {
                // Equipar en mano I o mano D si alguna está vacía
                if (is_null($user->Mizquierda)) {
                    $user->Mizquierda = $arma->imagen;
                } elseif (is_null($user->Mderecha)) {
                    $user->Mderecha = $arma->imagen;
                } else {
                    // Ambas manos ocupadas, no se puede equipar
                    return redirect()->route('user.index', ['id' => $id])->with('error', 'Ambas manos están ocupadas.');
                }
            } elseif ($arma->tamano == 2) {
                // Equipar en ambas manos si ambas están vacías
                if (is_null($user->Mizquierda) && is_null($user->Mderecha)) {
                    $user->Mizquierda = $arma->imagen;
                    $user->Mderecha = $arma->imagen;
                } else {
                    // Una o ambas manos ocupadas, no se puede equipar
                    return redirect()->route('user.index', ['id' => $id])->with('error', 'Ambas manos deben estar libres para equipar un arma de dos manos.');
                }
            }
            $user->save();
        }

        return redirect()->route('user.index', ['id' => $id]);
    }
    public function desequipar($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->Mizquierda = null;
            $user->Mderecha = null;
            $user->save();
        }

        return redirect()->route('user.index', ['id' => $id]);
    }
    public function equiparPocion($id, $idPoc)
    {
        $user = User::find($id);
        $pocion = Pocion::find($idPoc);
        if ($user && $pocion) {
            if (is_null($user->Mizquierda) && $user->Mderecha !== $pocion->imagen) {
                $user->Mizquierda = $pocion->imagen;
            } elseif (is_null($user->Mderecha) && $user->Mizquierda !== $pocion->imagen) {
                $user->Mderecha = $pocion->imagen;
            } else {
                // Ambas manos ocupadas o la misma poción ya está equipada en la otra mano
                return redirect()->route('user.index', ['id' => $id])->with('error', 'No se puede equipar la misma poción en ambas manos.');
            }
            $user->save();
        }

        return redirect()->route('user.index', ['id' => $id]);
    }
}
