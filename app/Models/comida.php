<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class comida extends Model
{
    // Forzamos el nombre de la tabla en singular para que coincida con la migración
    protected $table = 'comida';

    protected $fillable = [
        'nombre',
        'descripcion',
        'tipo',
        'precio'
    ];
}
