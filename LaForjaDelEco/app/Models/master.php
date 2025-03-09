<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class master extends Model
{
    use HasFactory;
    protected $table = 'master';
    protected $fillable = ['nombreMaster', 'imagen', 'password', 'email', 'codigo'];

    public function master()
    {
        return $this->hasOne(user::class);
    }
}
