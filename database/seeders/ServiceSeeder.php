<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder {

    public function run() {

        $faker = \Faker\Factory::create();

        for($i = 0; $i < 500; $i++) {
            Service::create([
                'name' => $faker->jobTitle() . ' Service',
            ]);
        }

    }

}
