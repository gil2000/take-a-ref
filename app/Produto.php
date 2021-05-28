<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{

    protected $table ='produtos';

    protected $fillable = [];

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function ementa(){
        return $this->hasMany(Ementa::class);
    }


}
