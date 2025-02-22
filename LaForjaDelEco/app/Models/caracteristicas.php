<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class caracteristicas extends Model
{
    use HasFactory;
    protected $table = 'caracteristicas';
    protected $fillable = ['vigor', 'aguante', 'fuerza', 'destreza', 'inteligencia', 'arcano'];

    public function personaje()
    {
        return $this->hasOne(Personaje::class);
    }
}
