<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaturasTable extends Migration
{
    //=============================================================================================================
    public function up()
    {
        Schema::create('faturas', function (Blueprint $table) {
            $table->id();
            $table->foreign('carrinho_id')->references('id')->on('carrinho');
            $table->foreign('nif_user')->references('nif')->on('users');
            $table->foreign('total_carrinho')->references('total')->on('carrinho');
            $table->timestamps();
        });
    }

    //=============================================================================================================
    public function down()
    {
        Schema::dropIfExists('faturas');
    }
}
