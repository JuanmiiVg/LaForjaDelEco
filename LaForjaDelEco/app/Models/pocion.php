<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class pocion extends Model
{
    use HasFactory;
    protected $table = 'pocion';
    protected $fillable = ['nombre', 'imagen', 'duracion', 'efecto', 'tamaño', 'peso'];

    public function inventario()
    {
        return $this->belongsToMany(Inventario::class, 'inventario_has_pocion')->withPivot('cantidad');;
    }

    public function ingrediente()
    {
        return $this->belongsToMany(Ingrediente::class, 'receta');
    }
}
