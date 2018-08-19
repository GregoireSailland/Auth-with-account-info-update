<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UsersTableSeeder extends Seeder
{
	public function run()
    {
        $faker = \Faker\Factory::create();

        $admin_id = DB::table('users')->insertGetId([
            'name' => 'admin',
            'email'=> 'admin@localhost.dev',
            'role'=> 'admin',
            'password' => \Illuminate\Support\Facades\Hash::make('admin')
        ]);
        $user_id = DB::table('users')->insertGetId([
            'name' => 'user',
            'email'=> 'user@localhost.dev',
            'role'=> 'user',
            'password' => \Illuminate\Support\Facades\Hash::make('user')
        ]);
    }
}