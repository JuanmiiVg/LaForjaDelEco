<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class ingrediente extends Model
{
    use HasFactory;
    protected $table = 'ingrediente';
    protected $fillable = ['nombre', 'imagen', 'peso'];

    public function inventario()
    {
        return $this->belongsToMany(Inventario::class, 'inventario_has_ingrediente')->withPivot('cantidad');;
    }

    public function pocion()
    {
        return $this->belongsToMany(Pocion::class, 'receta');
    }
}
