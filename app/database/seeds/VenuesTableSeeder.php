<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class VenuesTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        foreach(range(1, 10) as $index)
        {
            Venue::create([
            	'name' => $faker->company(),
            	'city' => $faker->city(),
            	'postcode' => $faker->postcode(),
            	'address' => $faker->streetAddress(),
            	'description' => $faker->paragraph(5),
            	'capacity' => $faker->randomNumber(1, 2500),
            	'price' => $faker->randomNumber(50000, 1000000),
            ]);
        }
    }

}