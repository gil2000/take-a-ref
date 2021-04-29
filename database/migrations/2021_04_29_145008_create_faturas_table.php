<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaturasTable extends Migration
{
    //======================================================================================
    public function up()
    {
        Schema::create('faturas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreignId('carrinho_id');
            $table->foreign('carrinho_id')->references('id')->on('carrinhos');
            $table->foreignId('comp_carrinho_id');
            $table->foreign('comp_carrinho_id')->references('id')->on('comp_carrinhos');
            $table->timestamps();
        });
    }

    //======================================================================================
    public function down()
    {
        Schema::dropIfExists('faturas');
    }
}
