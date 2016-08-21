<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutorials', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('title');
            $table->integer('course_id')->unsigned();
            $table->foreign('course_id')
                  ->references('id')->on('courses')->onDelete('cascade');
            $table->string('level');
            $table->string('teacher');
            $table->string('fee');
            $table->string('description');
			$table->string("language")->default("English");
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
        Schema::drop('tutorials');
    }
}
