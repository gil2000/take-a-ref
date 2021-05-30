<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cantina extends Model
{
    protected $fillable = [
        'nome',
        'horario',
        'localizacao'
    ];
}
