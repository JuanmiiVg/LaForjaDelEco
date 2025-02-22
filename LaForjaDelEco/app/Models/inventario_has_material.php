<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class inventario_has_material extends Model
{
    use HasFactory;
    protected $table = 'inventario_has_material';
    protected $fillable = ['inventario_id', 'material_id', 'cantidad'];

    public function inventario()
    {
        return $this->belongsTo(Inventario::class);
    }

    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}
