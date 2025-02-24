<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class personaje extends Model
{
    use hasFactory;
    protected $table = 'personaje';
    protected $fillable = ['nombre', 'email', 'password', 'imagen', 'rubies', 'Mderecha', 'Mizquierda'];

    public function master()
    {
        return $this->belongsTo(Master::class);
    }

    public function inventario()
    {
        return $this->hasOne(Inventario::class);
    }

    public function caracteristicas()
    {
        return $this->hasOne(Caracteristicas::class);
    }

    public function cargarInventario()
    {
        // Asegurarse de que el personaje tiene inventario
        if (!$this->inventario) {
            return collect([]);
        }

        $inventario = $this->inventario;

        $armas = $inventario->armas()->with('arma')->get()->map(function ($item) {
            return [
                'tipo' => 'arma',
                'nombre' => $item->arma->nombre,
                'cantidad' => $item->cantidad,
            ];
        });

        $materiales = $inventario->materiales()->with('material')->get()->map(function ($item) {
            return [
                'tipo' => 'material',
                'nombre' => $item->material->nombre,
                'cantidad' => $item->cantidad,
            ];
        });

        $ingredientes = $inventario->ingredientes()->with('ingrediente')->get()->map(function ($item) {
            return [
                'tipo' => 'ingrediente',
                'nombre' => $item->ingrediente->nombre,
                'cantidad' => $item->cantidad,
            ];
        });

        $pociones = $inventario->pociones()->with('pocion')->get()->map(function ($item) {
            return [
                'tipo' => 'pocion',
                'nombre' => $item->pocion->nombre,
                'cantidad' => $item->cantidad,
            ];
        });

        // Unir todos los items en una sola colección
        return $armas->merge($materiales)->merge($ingredientes)->merge($pociones);
    }
}

