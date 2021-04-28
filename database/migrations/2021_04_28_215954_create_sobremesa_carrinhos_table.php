<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSobremesaCarrinhosTable extends Migration
{
    //=============================================================================================================

    public function up()
    {
        Schema::create('sobremesa_carrinhos', function (Blueprint $table) {
            $table->id();
            $table->foreign('sobremesa_ementa')->references('sobremesas_ementa')->on('ementa');
            $table->timestamps();
        });
    }

    //=============================================================================================================

    public function down()
    {
        Schema::dropIfExists('sobremesa_carrinhos');
    }
}
