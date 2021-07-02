<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('refid')->nullable();
            $table->integer('world_id')->nullable();
            $table->string('icon')->nullable();
            $table->string('location_name')->nullable();
            $table->integer('map_id')->nullable();
            $table->integer('nxt_mp_level')->nullable();
            $table->string('stat')->default('A');
            $table->string('center_coord');
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
        Schema::dropIfExists('countries');
    }
}
