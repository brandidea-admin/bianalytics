<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('logo')->nullable();
            $table->string('address')->nullable();
            $table->string('location')->nullable();
            $table->string('events')->nullable();
            $table->text('emails')->nullable();
            $table->string('phones')->nullable();
            $table->string('keyword')->nullable();
            $table->json('news')->nullable();

            $table->enum('status', ['active', 'inactive', 'pending'])->default('active');
            $table->integer('created_by')->default(1);
            $table->integer('updated_by')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
