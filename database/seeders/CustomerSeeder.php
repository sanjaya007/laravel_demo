<?php

namespace Database\Seeders;

use App\Models\Customer;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i <= 100; $i++) {
            $customer = new Customer();
            $customer->name = $faker->name;
            $customer->email = $faker->email;
            $customer->dob = $faker->date;
            $customer->password = $faker->password;
            $customer->country = $faker->country;
            $customer->state = $faker->state;
            $customer->address = $faker->address;
            $customer->gender = $i % 2 == 0 ? 'M' : 'F';
            $customer->file = $faker->name;
            $customer->save();
        }
    }
}
