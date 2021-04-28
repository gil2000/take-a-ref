<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSopasTable extends Migration
{
    //=============================================================================================================
    public function up()
    {
        Schema::create('sopas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->text('descricao');
            $table->float('preco');
            $table->timestamps();
        });
    }

    //=============================================================================================================
    public function down()
    {
        Schema::dropIfExists('sopas');
    }
}
