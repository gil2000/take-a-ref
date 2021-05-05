<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table ='produtos';

    public function categorias(){
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

}
