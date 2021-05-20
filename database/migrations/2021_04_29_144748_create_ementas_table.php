<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmentasTable extends Migration
{
    //======================================================================================
    public function up()
    {
        Schema::create('ementas', function (Blueprint $table) {
            $table->id();
            $table->timestamp('dia');
            $table->integer('tipo');
            $table->integer('diasemana');
            $table->foreignId('produto_id');
            $table->foreign('produto_id')->references('id')->on('produtos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    //======================================================================================
    public function down()
    {
        Schema::dropIfExists('ementas');
    }
}
