<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackTable extends Migration
{
    //=============================================================================================================

    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('email');
            $table->text('texto');
            $table->timestamps();
        });
    }

    //=============================================================================================================

    public function down()
    {
        Schema::dropIfExists('feedback');
    }
}
