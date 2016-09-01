<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnrolcoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrolcourses', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
			$table->integer("tutorial_id");
    
$table->integer("user_id");
$table->string("user");
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('enrolcourses');
    }
}
