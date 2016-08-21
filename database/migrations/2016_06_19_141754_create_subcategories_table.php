<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('subcategories', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('name');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')
                  ->references('id')->on('subcategories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('subcategories');
    }
}
