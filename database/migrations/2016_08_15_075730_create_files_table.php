<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('files', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('file_name')->unique();
            $table->integer('user_id');
            $table->integer('tutorial_id');
            $table->text('description');
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
        Schema::drop('files');
    }
}
