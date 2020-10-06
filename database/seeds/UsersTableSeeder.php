<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
        	'role_id' => '1',
        	'role_name' => 'Admin',
        	'name' => 'nazain',
        	'email' => 'nazain@gmail.com',
        	'password' => bcrypt('nazain123'),
        ]);

        DB::table('users')->insert([
        	'role_id' => '2',
        	'role_name' => 'Author',
        	'name' => 'zaraki',
        	'email' => 'zaraki@gmail.com',
        	'password' => bcrypt('zaraki123'),
        ]);
    }
}
