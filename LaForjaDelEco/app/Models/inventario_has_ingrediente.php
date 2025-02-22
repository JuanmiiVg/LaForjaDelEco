<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class inventario_has_ingrediente extends Model
{
    use HasFactory;
    protected $table = 'inventario_has_ingrediente';
    protected $fillable = ['inventario_id', 'ingrediente_id', 'cantidad'];

    public function inventario()
    {
        return $this->belongsTo(Inventario::class);
    }

    public function ingrediente()
    {
        return $this->belongsTo(Ingrediente::class);
    }
}
