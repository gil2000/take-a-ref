<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmentasTable extends Migration
{
    //=============================================================================================================
    public function up()
    {
        Schema::create('ementas', function (Blueprint $table) {
            $table->id();
            $table->date('dia');
            $table->string('horario_tipo');
            $table->foreign('sopas_ementa')->references('id')->on('sopas');
            $table->foreign('condutos_ementa')->references('id')->on('condutos');
            $table->foreign('bebidas_ementa')->references('id')->on('bebidas');
            $table->foreign('sobremesas_ementa')->references('id')->on('sobremesas');
            $table->timestamps();
        });
    }

    //=============================================================================================================
    public function down()
    {
        Schema::dropIfExists('ementas');
    }
}
