<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class master extends Model
{
    use HasFactory;
    protected $table = 'master';
    protected $fillable = ['nombre', 'imagen', 'password' , 'email'];

    public function personaje()
    {
        return $this->hasOne(Personaje::class);
    }
}
