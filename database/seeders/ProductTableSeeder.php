<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i=0; $i <= 50; $i++) { 
            DB::table('product')->insert([
                'name' => $faker->name,
                'description' => 'lorem ipsum dolor sit amet',
                'price' => $faker->randomDigit,
                'status' => 'Available'

            ]);
        }
    }
}
