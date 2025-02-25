<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personaje;
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

class PersonajeController extends Controller
{
    public function index($id)
    {
        $personaje = Personaje::findOrFail($id);
        $caracteristicas = Caracteristicas::findOrFail($personaje->caracteristicas_id);
        $inventario = Inventario::findOrFail($personaje->inventario_id);

        // Obtengo los registros de objetos asociados al inventario
        $pociones_datos = Inventario_Has_Pocion::where("inventario_id", $personaje->inventario_id)->get();
        $ingredientes_datos = Inventario_Has_Ingrediente::where("inventario_id", $personaje->inventario_id)->get();
        $armas_datos = Inventario_Has_Arma::where("inventario_id", $personaje->inventario_id)->get();
        $materiales_datos = Inventario_Has_Material::where("inventario_id", $personaje->inventario_id)->get();

        // Obtengo los objetos en sí
        $pociones = Pocion::whereIn("id", $pociones_datos->pluck("pocion_id"))->get();
        $ingredientes = Ingrediente::whereIn("id", $ingredientes_datos->pluck("ingrediente_id"))->get();
        $armas = Arma::whereIn("id", $armas_datos->pluck("arma_id"))->get();
        $materiales = Material::whereIn("id", $materiales_datos->pluck("material_id"))->get();

        // Retorno la vista con los datos
        return view("inventario", compact("personaje", "caracteristicas", "inventario", "pociones", "ingredientes", "armas", "materiales"));
    }

    public function deleteArma($id, $idArm)
    {
        $arma = Arma::find($idArm);
        if ($arma) {
            Inventario_Has_Arma::where('arma_id', $idArm)->delete();
            $arma->delete();
        }

        return $this->index($id);
    }

    public function deletePocion($id, $idPoc)
    {
        $pocion = Pocion::find($idPoc);
        if ($pocion) {
            Inventario_Has_Pocion::where('pocion_id', $idPoc)->delete();
            $pocion->delete();
        }

        return $this->index($id);
    }

    public function deleteMaterial($id, $idMat)
    {
        $material = Material::find($idMat);
        if ($material) {
            Inventario_Has_Material::where('material_id', $idMat)->delete();
            $material->delete();
        }

        return $this->index($id);
    }

    public function deleteIngrediente($id, $idIng)
    {
        $ingrediente = Ingrediente::find($idIng);
        if ($ingrediente) {
            Inventario_Has_Ingrediente::where('ingrediente_id', $idIng)->delete();
            $ingrediente->delete();
        }

        return $this->index($id);
    }
}
