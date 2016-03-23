<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id');
            $table->string('url');
            $table->string('name');
            $table->tinyInteger('menu_type');
            $table->tinyInteger('role_id');
            $table->tinyInteger('deep');
            $table->tinyInteger('ordering');
            $table->tinyInteger('position');
            $table->tinyInteger('active');
            $table->text('data_access');
            $table->tinyInteger('allow_guest');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
