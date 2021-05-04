<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarrinhosTable extends Migration
{
    //======================================================================================
    public function up()
    {
        Schema::create('carrinhos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ementa_dia');
            $table->foreign('ementa_dia')->references('id')->on('ementas');
            $table->foreignId('users_id');
            $table->foreign('users_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    //======================================================================================
    public function down()
    {
        Schema::dropIfExists('carrinhos');
    }
}
