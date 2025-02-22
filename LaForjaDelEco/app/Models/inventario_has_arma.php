<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class inventario_has_arma extends Model
{
    use HasFactory;
    protected $table = 'inventario_has_arma';
    protected $fillable = ['inventario_id', 'arma_id' , 'cantidad'];

    public function inventario()
    {
        return $this->belongsTo(Inventario::class);
    }

    public function arma()
    {
        return $this->belongsTo(Arma::class);
    }

}
