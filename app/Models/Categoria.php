<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;

class Categoria extends Model
{
    protected $fillable = ['codigo', 'nombre'];

    public function productos()
    {
        return $this->hasMany(Producto::class); //Esto sirve para realizar la relación uno a muchos con productos
    }
}

