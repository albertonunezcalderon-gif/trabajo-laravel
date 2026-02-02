<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    // Esto sirve para indicar los campos que están permitidos con asignación masiva y así los campos de las fechas no puedan modificarlos ya que los datos se almacenan mediante objetos.
    protected $fillable = [
        'producto_id',
        'cantidad',
    ];
}

