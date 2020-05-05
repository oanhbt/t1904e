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

      for($i  = 0; $i < 20; $i++) {
          Apartment::create([
              'title' => $faker->sentence(4),
              'address' => $faker->sentence(4),
              'price' => '1000000000',
              'summary' => $faker->sentence(4),
              'content' => $faker->sentence(4),
              'image' => $faker->sentence(4),
              'status' => $faker->boolean($chanceOfGettingTrue = 90)
          ]);
      }
    }
}
