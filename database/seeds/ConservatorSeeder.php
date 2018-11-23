<?php

use Illuminate\Database\Seeder;

class ConservatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 50 ; $i++) { 
        	DB::table('conservator')->insert([
	            'name' => str_random(10),
	            'password' => Hash::make('12345678'),
	            'email' => str_random(10).'@gmail.com',
	            'tel' => '13'.rand(111111111,999999999),
	            'img'=>'/uploads/7531542874762.jpg.jpg',
	            'status'=>'1'
	        ]);
        }
    }
}
