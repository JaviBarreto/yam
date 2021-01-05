<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RestaurantSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        factory('App\Models\Store', 20)->create();
        factory('App\Models\Category', 20)->create();
        factory('App\Models\Product', 20)->create();
        factory('App\Models\Offer', 20)->create();
        factory('App\Models\Complement', 20)->create();
        factory('App\Models\ProductComplement', 20)->create();
        factory('App\Models\ComplementProduct', 40)->create();
        factory('App\Models\FaqTopic', 20)->create();
        factory('App\Models\Faq', 20)->create();
        factory('App\Models\Address', 20)->create();
        factory('App\Models\Order', 20)->create();
        factory('App\Models\OrderProduct', 20)->create();
    }
}
