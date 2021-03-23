<?php

use Illuminate\Database\Seeder;

class UsersTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $faker = \Faker\Factory::create();

        // Let's make sure everyone has the same password and 
        // let's hash it before the loop, or else our seeder 
        // will be too slow.
        $password = Hash::make('toptal');

        User::create([
            'name' => 'Administrator',
            'email' => 'ogbagahjb@gmail.com',
            'password' => $password,
        ]);

        // And now let's generate a few dozen users for our app:
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $password,
                ]);
            }
    }

    }

        User::truncate();
        $faker=\Faker\Factory::create();

        $password=Hash::make('toptap');
        User::create([
            'name'=>'Administrator',
            'email'=>'ogbagahjb@gmail.com',
            'password'=>$passwordpassword,

        ]);
        for ($i =0; $i<10; $i++){
            User::create([
                'name'=>$faker->name,
                'email'=>$faker->email,
                'password'=>$password
            ]);
            }
        