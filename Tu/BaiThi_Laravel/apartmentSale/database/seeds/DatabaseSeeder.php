<?php

use Illuminate\Database\Seeder;
use App\apartment as Apartment ;

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
for($i =0;$i<20;$i++){
    Apartment::create([
        'name'=>$faker->sentence(4),
        'adress'=>$faker->sentence(4),
        'garenalinfomation'=>$faker->sentence(4),
        'detailinfomation'=>$faker->sentence(4),
        'status'=>$faker->sentence(4),
        'thumb'=>$faker->sentence(4),
        'price'=>'100000'

    ]);

}

    }
}
