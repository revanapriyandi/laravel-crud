<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class siswa extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$faker = Faker::create();

    	for ($i=1; $i < 10 ; $i++) { 


    		DB::table('siswa')->insert([
    			'nama_depan' => $faker->firstName,
    			'nama_belakang' => $faker->lastName,
    			'jenis_kelamin' => $faker->randomElement($array = array ('L', 'P')),
    			'agama' =>  $faker->randomElement($array = array ('Islam', 'Lainnya')),
    			'alamat' => $faker->randomElement($array = array ('Indonesia', 'Lainnya')),
    			'created_at' => $faker->dateTime,
    			'updated_at' => $faker->dateTime

    		]);
    	}

    	

    }
}
