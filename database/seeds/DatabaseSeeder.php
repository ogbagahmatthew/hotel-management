<?php

use Illuminate\Database\Seeder;
// use App\Bookings;
// use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // {
            $this->call(BookingsTableseeder::class);
            $this->call(UsersTableseeder::class);
        
    }
}
