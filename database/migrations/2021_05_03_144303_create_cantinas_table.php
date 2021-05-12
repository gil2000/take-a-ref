<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCantinasTable extends Migration
{

    public function up()
    {
        Schema::create('cantinas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('horario');
            $table->string('localizacao');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('cantinas');
    }
}
