<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 30 ; $i++) { 
        	DB::table('user')->insert([
	            'name' => str_random(10),
	            'password' => Hash::make('12345678'),
	            'email' => str_random(10).'@gmail.com',
	            'tel' => '13'.rand(111111111,999999999),
	            'img'=>'/uploads/5391542897748.jpg',
	            'sex'=>'1'
	        ]);
        }
    }
}
