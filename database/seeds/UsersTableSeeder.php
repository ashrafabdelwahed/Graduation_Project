<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = \App\User::create([

            'name'              => 'Super Admin',
            'email'             => 'super_admin@app.com',
            'password'          => bcrypt('123456'),
            'phone'             => '01129441381',
            'city_id'           => '1',
            'specialization_id' => '1'
        ]);

        $user->attachRole('super_admin');


    }
}
