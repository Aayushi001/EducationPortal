<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTutorialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('tutorials')->insert(array(
            'title' => 'JavaScript the Basics - JavaScript for Beginners',
            'course_id'=> '1',
            'level'=> 'Beginner',
            'teacher' => 'John Steve Robinson' ,
            'fee' => '800' ,
            'description' => 'JavaScript for Beginners: Learn JavaScript the programming language through whiteboard videos and hands on practice.' ,
            'created_at'=>date('Y:m:d H:m:s'),
            'updated_at'=>date('Y:m:d H:m:s')
            ));

        DB::table('tutorials')->insert(array(
            'title' => 'JavaScript JSON and AJAX Explained JavaScript Objects',
            'course_id'=> '1',
            'level'=> 'Beginner',
            'teacher' => 'John Steve Robinson' ,
            'fee' => '600' ,
            'description' => 'JavaScript for Beginners: Learn JavaScript the programming language through whiteboard videos and hands on practice.' ,
            'created_at'=>date('Y:m:d H:m:s'),
            'updated_at'=>date('Y:m:d H:m:s')
            ));

        DB::table('tutorials')->insert(array(
            'title' => 'JavaScript Programming: Learn by Making a Mobile Game',
            'course_id'=> '1',
            'level'=> 'Intermediate',
            'teacher' => 'John Steve Robinson' ,
            'fee' => '900' ,
            'description' => 'JavaScript for Beginners: Learn JavaScript the programming language through whiteboard videos and hands on practice.' ,
            'created_at'=>date('Y:m:d H:m:s'),
            'updated_at'=>date('Y:m:d H:m:s')
            ));

        DB::table('tutorials')->insert(array(
            'title' => 'JavaScript from Scratch by Examples',
            'course_id'=> '1',
            'level'=> 'Advanced',
            'teacher' => 'John Steve Robinson' ,
            'fee' => '600' ,
            'description' => 'JavaScript for Beginners: Learn JavaScript the programming language through whiteboard videos and hands on practice.' ,
            'created_at'=>date('Y:m:d H:m:s'),
            'updated_at'=>date('Y:m:d H:m:s')
            ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         DB::table('tutorials')->where('title', '=', 'JavaScript the Basics - JavaScript for Beginners')->delete();
         DB::table('tutorials')->where('title', '=', 'JavaScript JSON and AJAX Explained JavaScript Objects')->delete();
         DB::table('tutorials')->where('title', '=', 'JavaScript Programming: Learn by Making a Mobile Game')->delete();
         DB::table('tutorials')->where('title', '=', 'JavaScript from Scratch by Examples')->delete();
    }
}
