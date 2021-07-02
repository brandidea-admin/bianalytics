<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_menu', function (Blueprint $table) {
            $table->id();
            $table->integer('refid')->nullable();
            $table->string('menu_name')->nullable();
            $table->integer('level_id')->nullable();
            $table->integer('menu_item_id')->nullable();
            $table->char('is_child', 1)->nullable();
            $table->integer('menu_id')->nullable();
            $table->string('app_img')->nullable();
            $table->integer('parent_id')->nullable();
            $table->integer('order_fld')->nullable();
            $table->char('stat', 1);
            $table->timestamps();
        });

        Schema::rename('master_menu', 'master_menus');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_masters');
    }
}
