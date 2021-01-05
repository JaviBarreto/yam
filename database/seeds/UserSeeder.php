<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [            
            [
                'id' => 1,
                'firstname' => 'Administrator',
                'lastname' => 'Admin',
                'email' => 'admin@yam.test',
                'password' => Hash::make('adminyam'),
                'phone_number' =>'999999999',
                'role_id' => 1

            ],

            [
                'id' => 2,
                'firstname' => 'Client 1',
                'lastname' => 'test',
                'email' => 'client1@yam.test',
                'password' => Hash::make('password'),
                'phone_number' =>'999999991',
                'role_id' => 2

            ],

            [
                'id' => 3,
                'firstname' => 'Client 2',
                'lastname' => 'test',
                'email' => 'client2@yam.test',
                'password' => Hash::make('password'),
                'phone_number' =>'999999992',
                'role_id' => 2

            ],
        ];

        foreach ($items as $item) {
            User::updateOrCreate(['id' => $item['id']], $item);
        }
    }
}
