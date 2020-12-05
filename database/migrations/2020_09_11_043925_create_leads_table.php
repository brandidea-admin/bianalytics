<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('designaion')->nullable();
            $table->string('company')->nullable();
            $table->string('category')->nullable();
            $table->text('emails')->nullable();
            $table->text('email_req_id')->nullable();
            $table->string('phones')->nullable();
            $table->string('keyword')->nullable();
            $table->string('location')->nullable();
            $table->json('news')->nullable();

            $table->enum('status', ['active', 'inactive', 'pending'])->default('active');
            $table->integer('created_by')->default(1);
            $table->integer('updated_by')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('leads');
    }
}
