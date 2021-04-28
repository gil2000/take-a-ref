<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSopaCarrinhosTable extends Migration
{
    //=============================================================================================================
    public function up()
    {
        Schema::create('sopa_carrinhos', function (Blueprint $table) {
            $table->id();
            $table->foreign('sopa_ementa')->references('sopas_ementa')->on('ementa');
            $table->timestamps();
        });
    }

    //=============================================================================================================
    public function down()
    {
        Schema::dropIfExists('sopa_carrinhos');
    }
}
