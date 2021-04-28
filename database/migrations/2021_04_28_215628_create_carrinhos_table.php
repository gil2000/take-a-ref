<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarrinhosTable extends Migration
{
    //=============================================================================================================
    public function up()
    {
        Schema::create('carrinhos', function (Blueprint $table) {
            $table->id();
            $table->foreign('sopa')->references('sopa_ementa')->on('sopa_carrinho');
            $table->foreign('conduto')->references('conduto_ementa')->on('conduto_carrinho');
            $table->foreign('sobremesa')->references('sobremesa_ementa')->on('sobremesa_carrinho');
            $table->foreign('bebida')->references('bebida_ementa')->on('bebida_carrinho');
            $table->float('total');
            $table->boolean('confirmado');
            $table->timestamps();
        });
    }

    //=============================================================================================================
    public function down()
    {
        Schema::dropIfExists('carrinhos');
    }
}
