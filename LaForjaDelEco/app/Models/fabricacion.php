<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class fabricacion extends Model
{
    use HasFactory;
    protected $table = 'fabricacion';
    protected $fillable = ["material_id", "arma_id"];

    public function material()
    {
        return $this->belongsTo(Material::class);
    }

    public function arma()
    {
        return $this->belongsTo(Arma::class);
}
}