<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    // Campos permitidos para asignación masiva
    protected $fillable = [
        'producto_id',
        'cantidad',
    ];
}

