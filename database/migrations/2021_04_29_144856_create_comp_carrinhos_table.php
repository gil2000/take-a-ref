<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompCarrinhosTable extends Migration
{
    //======================================================================================
    public function up()
    {
        Schema::create('comp_carrinhos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('carrinho_id');
            $table->foreign('carrinho_id')->references('id')->on('carrinhos');
            $table->foreignId('produto_id');
            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->float('total');
            $table->timestamps();
        });
    }

    //======================================================================================
    public function down()
    {
        Schema::dropIfExists('comp_carrinhos');
    }
}
