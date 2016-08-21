<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('categories')->insert(array(
            'name' => 'CBSE'
            ));

        DB::table('categories')->insert(array(
            'name' => 'JEE (Advanced)'
            ));

        DB::table('categories')->insert(array(
            'name' => 'JEE (Mains)'
            ));

        DB::table('categories')->insert(array(
            'name' => 'NEET'
            ));


        DB::table('categories')->insert(array(
            'name' => 'BITSAT'
            ));


        DB::table('categories')->insert(array(
            'name' => 'CLAT'
            ));

       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         DB::table('categories')->where('name', '=', 'CBSE')->delete();
         DB::table('categories')->where('name', '=', 'JEE (Advanced)')->delete();
         DB::table('categories')->where('name', '=', 'JEE (Mains)')->delete();
         DB::table('categories')->where('name', '=', 'NEET')->delete();
         DB::table('categories')->where('name', '=', 'BITSAT')->delete();
         DB::table('categories')->where('name', '=', 'CLAT')->delete();
    }
}
