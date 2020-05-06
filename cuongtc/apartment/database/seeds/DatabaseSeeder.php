<?php

use Illuminate\Database\Seeder;
use App\Apartment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i < 20; $i++) {
          Apartment::create([
            'name' => $faker->sentence(4),
            'address' => $faker->sentence(4),
            'price' => '18000000000',
            'general_information' => $faker->sentence(4),
            'detail_information' => $faker->sentence(4),
            'image' => $faker->sentence(4),
            'status' => $faker->sentence(4),
          ]);
        }
    }
}
