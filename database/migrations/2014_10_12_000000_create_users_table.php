<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('designation')->nullable();
            $table->string('country')->nullable();
            $table->string('Organization')->nullable();
            $table->string('about_orgn')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('token')->unique();
            $table->string('user_type')->default('INVESTOR');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->string('status');
            $table->rememberToken();
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('users');
    }
}