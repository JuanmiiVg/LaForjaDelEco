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
   
   
}

