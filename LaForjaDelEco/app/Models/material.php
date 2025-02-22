<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class material extends Model
{
    use HasFactory;
    protected $table = 'material';
    protected $fillable = ['nombre', 'imagen', 'peso'];

    public function inventario()
    {
        return $this->belongsToMany(Inventario::class, 'inventario_has_material')->withPivot('cantidad');;
    }

    public function arma()
    {
        return $this->belongsToMany(Arma::class, 'fabricacion');
    }
}
