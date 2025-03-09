<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Caracteristicas;
use Illuminate\Support\Facades\Storage;

class CaracteristicasController extends Controller
{
    function edit($id, $idC)
    {
        $user = User::find($id);
        $caracteristicas = Caracteristicas::find($idC);

        return view('caracteristicas', compact('user', 'caracteristicas', 'idC', 'id'));
    }

    public function update($id, $idC)
    {
        $caracteristicas = request()->validate([
            'vigor' => 'integer|min:0|max:100',
            'inteligencia' => 'integer|min:0|max:100',
            'aguante' => 'integer|min:0|max:100',
            'fuerza' => 'integer|min:0|max:100',
            'destreza' => 'integer|min:0|max:100',
            'arcano' => 'integer|min:0|max:100',
        ]);

        $user = User::find($id);

        if (request()->hasFile('imagen')) {
            // Comprobar si el usuario ya tiene una imagen y borrarla
            if ($user->imagen) {
                Storage::disk('public')->delete($user->imagen);
            }
            $carpetaUser = 'imagenes/users/' . $user->id;
            // Guardar la nueva imagen
            $path = request()->file('imagen')->store($carpetaUser, 'public');
            $user->update(['imagen' => $path]);
        }

        // Verificar si se enviaron características
        if (isset($caracteristicas['vigor']) || isset($caracteristicas['inteligencia']) || isset($caracteristicas['aguante']) || isset($caracteristicas['fuerza']) || isset($caracteristicas['destreza']) || isset($caracteristicas['arcano'])) {
            $total = ($caracteristicas['vigor'] ?? 0) + ($caracteristicas['aguante'] ?? 0) + ($caracteristicas['fuerza'] ?? 0) + ($caracteristicas['destreza'] ?? 0) + ($caracteristicas['arcano'] ?? 0);

            if ($total > 150) {
                return redirect()->back()->withErrors(['msg' => 'La suma de las características no puede ser mayor a 125.'])->withInput();
            }

            // Guardar las características actualizadas en la base de datos
            $caracteristicasModel = Caracteristicas::find($idC);
            $caracteristicasModel->update($caracteristicas);
        }

        return redirect()->route('user.index', ['id' => $id]);
    }
}
