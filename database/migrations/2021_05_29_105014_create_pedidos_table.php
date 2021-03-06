<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    //==========================================================================================
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('apelido');
            $table->string('morada');
            $table->string('codigopostal');
            $table->string('nif');
            $table->timestamps();
        });
    }

    //==========================================================================================
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
