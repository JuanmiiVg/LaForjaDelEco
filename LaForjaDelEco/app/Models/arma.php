<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class arma extends Model
{
    use HasFactory;
    protected $table = 'armas';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre', 'imagen', 'categoria', 'tamano', 'dano','peso'];

    public function inventario()
    {
        return $this->belongsToMany(Inventario::class, 'inventario_has_arma')->withPivot('cantidad');;
    }

    public function material()
    {
        return $this->belongsToMany(Material::class, 'fabricacion');
    }
}


