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
        $Faker = Faker\Factory::create();
        
        for($i = 0; $i < 20; $i++) {
            Apartment::create([
                'name' => $Faker->sentence,
                'price' => '888888',
                'address' => $Faker->sentence(4),
                'summary' => $Faker->sentence(4),
                'detail' => $Faker->sentence(4),
                'image' => 'house.jpg',
                'status' => $Faker->sentence(4)
            ]);
        }
    }
}
