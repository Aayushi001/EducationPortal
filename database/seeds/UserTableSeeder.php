<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     	$role_user = Role::where('name', 'User')->first();
     	$role_teacher = Role::where('name', 'Teacher')->first();
     	$role_admin = Role::where('name', 'Admin')->first();

        $user = new User();
        $user->name = 'Aayushi';
        $user->email = 'aayushi@facebook.com';
        $user->password = bcrypt('qwerty');
        $user->about_me = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris bibendum, odio sit amet lobortis congue, diam augue pretium sapien, sodales sollicitudin risus quam at tortor. Aliquam luctus purus vitae egestas dictum. Aliquam massa arcu, aliquet non turpis sed, ornare egestas enim. Vestibulum fringilla orci at ligula porta, a commodo enim dignissim. Donec sit amet libero nibh. Sed ut suscipit ligula, sit amet lobortis dui. Proin sapien orci, convallis id ornare ut, sagittis vel orci. In pharetra odio ex, tincidunt volutpat odio hendrerit at.';
        $user->save();
        $user->roles()->attach($role_user);
       
        $admin = new User();
        $admin->name = 'Pooja';
        $admin->email = 'pooja@facebook.com';
        $admin->password = bcrypt('qwerty');
        $admin->about_me = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris bibendum, odio sit amet lobortis congue, diam augue pretium sapien, sodales sollicitudin risus quam at tortor. Aliquam luctus purus vitae egestas dictum. Aliquam massa arcu, aliquet non turpis sed, ornare egestas enim. Vestibulum fringilla orci at ligula porta, a commodo enim dignissim. Donec sit amet libero nibh. Sed ut suscipit ligula, sit amet lobortis dui. Proin sapien orci, convallis id ornare ut, sagittis vel orci. In pharetra odio ex, tincidunt volutpat odio hendrerit at.';
        $admin->save();
        $admin->roles()->attach($role_admin);
       
        $teacher = new User();
        $teacher->name = 'Riya';
        $teacher->email = 'riya@gmail.com';
        $teacher->password = bcrypt('qwerty');
        $teacher->about_me = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris bibendum, odio sit amet lobortis congue, diam augue pretium sapien, sodales sollicitudin risus quam at tortor. Aliquam luctus purus vitae egestas dictum. Aliquam massa arcu, aliquet non turpis sed, ornare egestas enim. Vestibulum fringilla orci at ligula porta, a commodo enim dignissim. Donec sit amet libero nibh. Sed ut suscipit ligula, sit amet lobortis dui. Proin sapien orci, convallis id ornare ut, sagittis vel orci. In pharetra odio ex, tincidunt volutpat odio hendrerit at.';
        $teacher->save();
        $teacher->roles()->attach($role_teacher);
    }
}
