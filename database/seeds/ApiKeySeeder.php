<?php

use Illuminate\Database\Seeder;

class ApiKeySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('api_keys')->insert([
        	'tokens' => '30fb23ae-d51c-421c-bba2-b4362fc111cb',
        	'user_id' => '1',
        ]);

        DB::table('api_keys')->insert([
        	'tokens' => '00fda609-c446-4493-b401-1a91ca025a02',
        	'user_id' => '4',
        ]);

        DB::table('api_keys')->insert([
        	'tokens' => '9602534d-c3ea-40bf-9523-230fc1fa676b',
        	'user_id' => '2',
        ]);
    }
}
