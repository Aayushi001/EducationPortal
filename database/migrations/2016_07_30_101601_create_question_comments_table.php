<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
  {
        Schema::create('question_comments', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->longText('comment');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                  ->references('id')->on('users')->onDelete('cascade');
            $table->integer('question_id')->unsigned();
            $table->foreign('question_id')
                  ->references('id')->on('questions')->onDelete('cascade');
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
        Schema::drop('question_comments');
    }
}
