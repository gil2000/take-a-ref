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
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('estudante')->default('0');
            $table->string('instituicao')->nullable();
            $table->bigInteger('telemovel');
            $table->bigInteger('nif')->default('0');
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
