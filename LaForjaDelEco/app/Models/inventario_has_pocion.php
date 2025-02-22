<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class inventario_has_pocion extends Model
{
    use HasFactory;
    protected $table = 'inventario_has_pocion';
    protected $fillable = ['inventario_id', 'pocion_id', 'cantidad'];

    public function inventario()
    {
        return $this->belongsTo(Inventario::class);
    }

    public function pocion()
    {
        return $this->belongsTo(Pocion::class);
    }
}
