<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [            
            ['id' => 1, 'name' => 'Administrator'],
            ['id' => 2, 'name' => 'Client'],
        ];

        foreach ($items as $item) {
            Role::updateOrCreate(['id' => $item['id']], $item);
        }
    }
}
