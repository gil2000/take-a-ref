<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    //======================================================================================
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
            $table->string('nome');
            $table->string('descricao');
            $table->float('preco', 2)->nullable();
            $table->timestamps();
        });
    }

    //======================================================================================
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
