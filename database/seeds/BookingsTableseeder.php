<?php

use Illuminate\Database\Seeder;
use App\Bookings;
class BookingsTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bookings::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few Paymentss in our database:
        for ($i = 0; $i < 50; $i++) {
            Bookings::create([
                'name' => $faker->sentence,
                'address' => $faker->paragraph,
                'phone_no' => $faker->paragraph,
                'email' => $faker->paragraph,
            ]);
        }
    }
}
