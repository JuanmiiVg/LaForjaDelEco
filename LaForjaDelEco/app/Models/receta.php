<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class receta extends Model
{
    use HasFactory;
    protected $table = 'receta';
    protected $fillable = ["pocion_id", "ingrediente_id"];

    public function pocion()
    {
        return $this->belongsTo(Pocion::class);
    }

    public function ingrediente()
    {
        return $this->belongsTo(Ingrediente::class);
    }
}