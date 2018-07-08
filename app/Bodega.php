<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bodega extends Model
{
    protected $fillable = [
        'nombre', 'descripcion', 'numero',
    ];
}
