<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         DB::table('courses')->insert(array(
            'name' => 'SA-I Online Test Series',
            'subcategory_id'=> '1',
            'created_at'=>date('Y:m:d H:m:s'),
            'updated_at'=>date('Y:m:d H:m:s')
            ));

          DB::table('courses')->insert(array(
            'name' => 'SA-II Online Test Series',
            'subcategory_id'=> '1',
            'created_at'=>date('Y:m:d H:m:s'),
            'updated_at'=>date('Y:m:d H:m:s')
            ));

          DB::table('courses')->insert(array(
            'name' => 'SA-I & SA-II Online Test Series',
            'subcategory_id'=> '1',
            'created_at'=>date('Y:m:d H:m:s'),
            'updated_at'=>date('Y:m:d H:m:s')
            ));

         DB::table('courses')->insert(array(
            'name' => 'Topic wise Online Test Series',
            'subcategory_id'=> '2',
            'created_at'=>date('Y:m:d H:m:s'),
            'updated_at'=>date('Y:m:d H:m:s')
            ));

         DB::table('courses')->insert(array(
            'name' => 'Online Daily Practice Problems',
            'subcategory_id'=> '2',
            'created_at'=>date('Y:m:d H:m:s'),
            'updated_at'=>date('Y:m:d H:m:s')
            ));

         DB::table('courses')->insert(array(
            'name' => 'Complete Test Prep(DPP,Topic wise,Course wise Online Tests) ',
            'subcategory_id'=> '2',
            'created_at'=>date('Y:m:d H:m:s'),
            'updated_at'=>date('Y:m:d H:m:s')
            ));
          DB::table('courses')->insert(array(
            'name' => 'Topic wise Online Test Series',
            'subcategory_id'=> '3',
            'created_at'=>date('Y:m:d H:m:s'),
            'updated_at'=>date('Y:m:d H:m:s')
            ));

         DB::table('courses')->insert(array(
            'name' => 'Online Daily Practice Problems',
            'subcategory_id'=> '3',
            'created_at'=>date('Y:m:d H:m:s'),
            'updated_at'=>date('Y:m:d H:m:s')
            ));

         DB::table('courses')->insert(array(
            'name' => 'Complete Test Prep(DPP,Topic wise,Course wise Online Tests) ',
            'subcategory_id'=> '3',
            'created_at'=>date('Y:m:d H:m:s'),
            'updated_at'=>date('Y:m:d H:m:s')
            ));
          DB::table('courses')->insert(array(
            'name' => 'Topic wise Online Test Series',
            'subcategory_id'=> '4',
            'created_at'=>date('Y:m:d H:m:s'),
            'updated_at'=>date('Y:m:d H:m:s')
            ));

         DB::table('courses')->insert(array(
            'name' => 'Online Daily Practice Problems',
            'subcategory_id'=> '4',
            'created_at'=>date('Y:m:d H:m:s'),
            'updated_at'=>date('Y:m:d H:m:s')
            ));

         DB::table('courses')->insert(array(
            'name' => 'Complete Test Prep(DPP,Topic wise,Course wise Online Tests) ',
            'subcategory_id'=> '4',
            'created_at'=>date('Y:m:d H:m:s'),
            'updated_at'=>date('Y:m:d H:m:s')
            ));
         DB::table('courses')->insert(array(
            'name' => 'Topic wise Online Test Series',
            'subcategory_id'=> '5',
            'created_at'=>date('Y:m:d H:m:s'),
            'updated_at'=>date('Y:m:d H:m:s')
            ));

         DB::table('courses')->insert(array(
            'name' => 'Online Daily Practice Problems',
            'subcategory_id'=> '5',
            'created_at'=>date('Y:m:d H:m:s'),
            'updated_at'=>date('Y:m:d H:m:s')
            ));

         DB::table('courses')->insert(array(
            'name' => 'Complete Test Prep(DPP,Topic wise,Course wise Online Tests) ',
            'subcategory_id'=> '5',
            'created_at'=>date('Y:m:d H:m:s'),
            'updated_at'=>date('Y:m:d H:m:s')
            ));
          DB::table('courses')->insert(array(
            'name' => 'Topic wise Online Test Series',
            'subcategory_id'=> '6',
            'created_at'=>date('Y:m:d H:m:s'),
            'updated_at'=>date('Y:m:d H:m:s')
            ));

         DB::table('courses')->insert(array(
            'name' => 'Online Daily Practice Problems',
            'subcategory_id'=> '6',
            'created_at'=>date('Y:m:d H:m:s'),
            'updated_at'=>date('Y:m:d H:m:s')
            ));

         DB::table('courses')->insert(array(
            'name' => 'Complete Test Prep(DPP,Topic wise,Course wise Online Tests) ',
            'subcategory_id'=> '6',
            'created_at'=>date('Y:m:d H:m:s'),
            'updated_at'=>date('Y:m:d H:m:s')
            ));

          DB::table('courses')->insert(array(
            'name' => 'Topic wise Online Test Series',
            'subcategory_id'=> '7',
            'created_at'=>date('Y:m:d H:m:s'),
            'updated_at'=>date('Y:m:d H:m:s')
            ));

         DB::table('courses')->insert(array(
            'name' => 'Online Daily Practice Problems',
            'subcategory_id'=> '7',
            'created_at'=>date('Y:m:d H:m:s'),
            'updated_at'=>date('Y:m:d H:m:s')
            ));

         DB::table('courses')->insert(array(
            'name' => 'Complete Test Prep(DPP,Topic wise,Course wise Online Tests) ',
            'subcategory_id'=> '7',
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
        DB::table('courses')->where('subcategory_id', '=', '1')->delete();
        DB::table('courses')->where('subcategory_id', '=', '2')->delete();
        DB::table('courses')->where('subcategory_id', '=', '3')->delete();
        DB::table('courses')->where('subcategory_id', '=', '4')->delete();
        DB::table('courses')->where('subcategory_id', '=', '5')->delete();
        DB::table('courses')->where('subcategory_id', '=', '6')->delete();
        DB::table('courses')->where('subcategory_id', '=', '7')->delete();
    }
}
