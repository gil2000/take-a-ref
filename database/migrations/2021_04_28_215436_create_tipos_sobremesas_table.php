<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiposSobremesasTable extends Migration
{
    //=============================================================================================================
    public function up()
    {
        Schema::create('tipos_sobremesas', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
            $table->timestamps();
        });
    }

    //=============================================================================================================
    public function down()
    {
        Schema::dropIfExists('tipos_sobremesas');
    }
}
