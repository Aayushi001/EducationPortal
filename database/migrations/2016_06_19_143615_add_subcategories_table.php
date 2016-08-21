<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         DB::table('subcategories')->insert(array(
            'name' => 'CBSE for class X',
            'category_id' => '1'
            ));

        DB::table('subcategories')->insert(array(
            'name' => 'JEE(Advanced) for class XI',
            'category_id' => '2'
            ));

        DB::table('subcategories')->insert(array(
            'name' => 'JEE(Advanced) for class XII/XIII',
            'category_id' => '2'
            ));

        DB::table('subcategories')->insert(array(
            'name' => 'JEE(Mains) for class XI',
            'category_id' => '3'
            ));

        DB::table('subcategories')->insert(array(
            'name' => 'JEE(Mains) for class XII/XIII',
            'category_id' => '3'
            ));

        DB::table('subcategories')->insert(array(
            'name' => 'NEET for class XI',
            'category_id' => '4'
            ));

        DB::table('subcategories')->insert(array(
            'name' => 'NEET for class XII/XIII',
            'category_id' => '4'
            ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('subcategories')->where('name', '=', 'CBSE for class X')->delete();
        DB::table('subcategories')->where('name', '=', 'JEE(Advanced) for class XI')->delete();
        DB::table('subcategories')->where('name', '=', 'JEE(Advanced) for class XII/XIII')->delete();
        DB::table('subcategories')->where('name', '=', 'JEE(Mains) for class XI')->delete();
        DB::table('subcategories')->where('name', '=', 'JEE(Mains) for class XII/XIII')->delete();
        DB::table('subcategories')->where('name', '=', 'NEET for class XI')->delete();
        DB::table('subcategories')->where('name', '=', 'NEET for class XII/XIII')->delete();      

    }

}
