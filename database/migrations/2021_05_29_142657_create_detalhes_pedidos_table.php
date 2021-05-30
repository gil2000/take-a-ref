<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalhesPedidosTable extends Migration
{
    //========================================================================================================
    public function up()
    {
        Schema::create('detalhes_pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pedido_id');
            $table->foreign('pedido_id')->references('id')->on('pedidos')->onDelete('cascade');
            $table->foreignId('produto_id');
            $table->foreign('produto_id')->references('id')->on('produtos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    //========================================================================================================
    public function down()
    {
        Schema::dropIfExists('detalhes_pedidos');
    }
}
