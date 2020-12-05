<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneratedlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generatedlists', function (Blueprint $table) {
            $table->id();
            $table->integer('search_id');
            $table->string('full_name')->nullable();
            $table->string('designation')->nullable();
            $table->string('company')->nullable();
            $table->string('linkedin_url')->nullable();

            $table->enum('status', ['active', 'inactive', 'pending'])->default('active');
            $table->integer('created_by')->default(1);
            $table->integer('updated_by')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('generatedlists');
    }
}
