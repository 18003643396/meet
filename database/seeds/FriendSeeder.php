<?php

use Illuminate\Database\Seeder;

class FriendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 30 ; $i++) { 
        	DB::table('friend')->insert([
	            'name' => str_random(5),
	            
	            'url' => 'http://www.'.str_random(6).'.com',
	            
	        ]);
        }
    }
}
