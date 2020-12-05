<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterKeywordsTable extends Migration
{
    public function up()
    {
        Schema::create('master_keywords', function (Blueprint $table) {
            $table->id();
            $table->string('keyword')->nullable();
            $table->string('remarks')->nullable();
            $table->enum('status', ['active', 'inactive', 'pending'])->default('active');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('master_keywords');
    }
}
