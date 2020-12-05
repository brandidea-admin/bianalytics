<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsCollectionsTable extends Migration
{
    public function up()
    {
        Schema::create('news_collections', function (Blueprint $table) {
            $table->id();
            $table->integer('keyword_id');
            $table->json('news_info')->nullable();
            $table->enum('status', ['active', 'inactive', 'pending'])->default('active');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('news_collections');
    }
}
