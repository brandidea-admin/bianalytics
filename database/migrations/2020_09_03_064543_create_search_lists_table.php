<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSearchListsTable extends Migration
{
    public function up()
    {
        Schema::create('search_lists', function (Blueprint $table) {
            $table->id();
            $table->string('search_name');
            $table->string('keyword_1')->nullable();
            $table->string('keyword_2')->nullable();
            $table->string('keyword_3')->nullable();
            $table->string('country')->nullable();
            $table->string('country_site')->nullable();
            $table->enum('status', ['active', 'inactive', 'pending'])->default('pending');
            $table->integer('created_by')->default(1);
            $table->integer('updated_by')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('search_lists');
    }
}
