<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCondutoCarrinhosTable extends Migration
{
    //=============================================================================================================

    public function up()
    {
        Schema::create('conduto_carrinhos', function (Blueprint $table) {
            $table->id();
            $table->foreign('conduto_ementa')->references('condutos_ementa')->on('ementa');
            $table->timestamps();
        });
    }

    //=============================================================================================================

    public function down()
    {
        Schema::dropIfExists('conduto_carrinhos');
    }
}
