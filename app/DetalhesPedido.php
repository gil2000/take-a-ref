<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalhesPedido extends Model
{
    protected $fillable = [
        'produto_id',
        'pedido_id'
        ];

    public function pedido(){
        return $this->belongsTo(Pedido::class);
    }

    public function produto(){
        return $this->belongsTo(Produto::class);
    }

}
