<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria; // <- Necesario para la relación

class Producto extends Model
{
    protected $fillable = ['nombre', 'descripcion', 'precio', 'imagen', 'categoria_id'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}

