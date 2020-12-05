<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailpermutatesTable extends Migration
{
    public function up()
    {
        Schema::create('emailpermutates', function (Blueprint $table) {
            $table->id();
            $table->string('emailpermut_name');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('nick_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('domain_name')->nullable();
            $table->text('comments')->nullable();
            $table->enum('status', ['active', 'inactive', 'pending'])->default('active');
            $table->integer('created_by')->default(1);
            $table->integer('updated_by')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('emailpermutates');
    }
}
