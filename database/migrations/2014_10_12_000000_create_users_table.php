<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    //=============================================================================================================
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('estudante');
            $table->string('instituicao');
            $table->bigInteger('telemovel');
            $table->bigInteger('nif');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    //=============================================================================================================

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
