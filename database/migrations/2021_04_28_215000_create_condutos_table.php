<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCondutosTable extends Migration
{
    //=============================================================================================================
    public function up()
    {
        Schema::create('condutos', function (Blueprint $table) {
            $table->id();
            $table->foreign('tipos_conduto_id')->references('id')->on('tipos_conduto');
            $table->string('nome');
            $table->text('descricao');
            $table->float('preco');
            $table->timestamps();
        });
    }

    //=============================================================================================================
    public function down()
    {
        Schema::dropIfExists('condutos');
    }
}
