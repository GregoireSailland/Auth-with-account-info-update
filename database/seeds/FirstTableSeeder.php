<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class FirstTableSeeder extends Seeder
{
	/**
     * Run the database seeds.
     *
     * @return void
     */
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