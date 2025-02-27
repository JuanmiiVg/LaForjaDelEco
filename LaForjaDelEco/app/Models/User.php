<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'nombrePersonaje',
        'email',
        'password',
        'imagen',
        'rubies',
        'caracteristicas_id',
        'master_id',
        'inventario_id',
        'Mderecha',
        'Mizquierda'
    ];

    // Relación con Características
    public function caracteristicas()
    {
        return $this->belongsTo(Caracteristicas::class);
    }

    // Relación con Inventario
    public function inventario()
    {
        return $this->belongsTo(Inventario::class);
    }

    // Relación con Master
    public function master()
    {
        return $this->belongsTo(Master::class);
    }

    // Evento para crear automáticamente Inventario y Características
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $caracteristicas = Caracteristicas::create();
            $user->caracteristicas_id = $caracteristicas->id;

            $inventario = Inventario::create();
            $user->inventario_id = $inventario->id;
        });
    }
}
