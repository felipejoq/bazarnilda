<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'nombre', 'talla', 'descripcion', 'minimo','cantidad','bodega_id','categoria_id', 'barcode',
    ];

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function bodega(){
        return $this->belongsTo(Bodega::class);
    }

    public function retiradas(){
        return $this->belongsToMany(User::class,'productos_users')
            ->withPivot('accion','cantidad','created_at');
    }
}
