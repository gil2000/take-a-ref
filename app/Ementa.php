<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ementa extends Model
{
    protected $table = 'ementas';

    protected $fillable = ['dia', 'produto_id, tipo' , 'diasemana'];

    protected $dates = ['dia'];

    private $nomePrato = [
        1 => 'Prato Carne: ',
        2 => 'Prato Peixe: ',
        3 => 'Prato Vegetariano: ',
        4 => 'Doce: ',
        5 => 'Fruta: ',
        6 => 'Sopa: ',
        7 => 'Pão: ',
    ];

    public function produto(){
        return $this ->belongsTo(Produto::class);
    }

    public function nomePrato(){
        return $this->nomePrato[$this->produto->categoria_id];
    }

}
