<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table ='produtos';

    protected $fillable = [
        'categoria_id',
        'nome',
        'descricao',
    ];

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function ementa(){
        return $this->hasMany(Ementa::class);
    }

    public function detalhes(){
        return $this->hasMany(DetalhesPedido::class);
    }
}
