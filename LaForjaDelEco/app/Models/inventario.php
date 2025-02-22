<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class inventario extends Model
{
    use HasFactory;
    protected $table = 'inventario';
    protected $fillable = ['inventario_id' , 'cargaMax'];

    public function inventario_has_arma()
    {
        return $this->hasMany(inventario_has_arma::class)->withPivot('cantidad');;
    }

    public function inventario_has_material()
    {
        return $this->hasMany(inventario_has_material::class)->withPivot('cantidad');;
    }

    public function inventario_has_ingrediente()
    {
        return $this->hasMany(inventario_has_ingrediente::class)->withPivot('cantidad');;
    }

    public function inventario_has_pocion()
    {
        return $this->hasMany(inventario_has_pocion::class)->withPivot('cantidad');;
    }
}
