<?php

use Illuminate\Database\Seeder;
use App\Restaurant_consumable;
use App\Consumable;

class RestaurantConsumableTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Restaurant_consumable::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('restaurant_consumables')->insert([
            'restaurant_id' => '1',
            'consumable_id' => '1',
            'price' => '2.15',
            'category' => Consumable::find(1)->category
        ]);
        DB::table('restaurant_consumables')->insert([
            'restaurant_id' => '1',
            'consumable_id' => '2',
            'price' => '1.95',
            'category' =>  Consumable::find(2)->category
        ]);
        DB::table('restaurant_consumables')->insert([
            'restaurant_id' => '1',
            'consumable_id' => '3',
            'price' => '2.10',
            'category' => Consumable::find(3)->category
        ]);
    }
}
