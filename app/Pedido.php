<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'nome',
        'apedido',
        'morada',
        'codigopostal',
        'nif'
    ];

    public function detalhes(){
        return $this->hasMany(DetalhesPedido::class);
    }

}
