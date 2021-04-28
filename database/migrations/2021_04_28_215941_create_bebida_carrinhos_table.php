<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBebidaCarrinhosTable extends Migration
{
    //=============================================================================================================

    public function up()
    {
        Schema::create('bebida_carrinhos', function (Blueprint $table) {
            $table->id();
            $table->foreign('bebida_ementa')->references('bebidas_ementa')->on('ementa');
            $table->timestamps();
        });
    }

    //=============================================================================================================

    public function down()
    {
        Schema::dropIfExists('bebida_carrinhos');
    }
}
