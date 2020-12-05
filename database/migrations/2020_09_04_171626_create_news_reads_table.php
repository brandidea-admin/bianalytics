<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsReadsTable extends Migration
{
    public function up()
    {
        Schema::create('news_reads', function (Blueprint $table) {
            $table->id();
            $table->string('newsread_name');
            $table->integer('news_type')->nullable();
            $table->string('news_source_from')->nullable();
            $table->string('keywords')->nullable();
            $table->string('category')->nullable();
            $table->string('language')->nullable();
            $table->string('country')->nullable();
            $table->string('domain_name')->nullable();
            $table->string('company')->nullable();
            $table->string('from_date')->nullable();
            $table->string('to_date')->nullable();
            $table->string('sort_by')->nullable();
            $table->string('page')->nullable();
            $table->enum('status', ['active', 'inactive', 'pending'])->default('active');
            $table->integer('created_by')->default(1);
            $table->integer('updated_by')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('news_reads');
    }
}
