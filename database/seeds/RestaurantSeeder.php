<?php

use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('restaurants')->insert([

            [
                'name' => 'Restaurant Test 1',
                'website' => 'www.test1.com',
                'logo' => 'Test Logo 1',
                'contactnumber' => '999999999',
                'email' => 'test1@ejemplo.com',
                'phonenumber' => '255255'
            ],

            [
                'name' => 'Restaurant Test 2',
                'website' => 'www.test2.com',
                'logo' => 'Test Logo 2',
                'contactnumber' => '999999999',
                'email' => 'test2@ejemplo.com',
                'phonenumber' => '255255'
            ],

            [
                'name' => 'Restaurant Test 3',
                'website' => 'www.test1.com',
                'logo' => 'Test Logo 3',
                'contactnumber' => '999999999',
                'email' => 'test3@ejemplo.com',
                'phonenumber' => '255255'
            ]

        ]);
    }
}
