<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ementa extends Model
{
    protected $table = 'ementas';

    protected $fillable = ['dia', 'produto_id'];

    protected $dates = ['dia'];

    public function produto(){
        return $this ->belongsTo(Produto::class);
    }
}
