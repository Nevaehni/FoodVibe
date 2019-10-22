<?php

use Illuminate\Database\Seeder;
use App\RestaurantConsumable;
use App\Restaurant;
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
        RestaurantConsumable::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        foreach(range(1,3) as $r)
        {
            //Main course
            foreach(range(1,5) as $rr)
            {               
                //Get all restaurant consumables
                $getCurrentRestaurantConsumables = RestaurantConsumable::where('restaurant_id', $rr)->where('category', 'main course')->get();

                //Put ids in array
                $data = [];
                foreach($getCurrentRestaurantConsumables as $g)
                {
                    array_push($data, $g->consumable_id);
                }
                
                //If empty put 0 in array
                if(count($data) == 0)
                {                    
                    $data = [0];
                }

                //Find random id
                $randomConsumable = Consumable::where('category', 'main course')->whereNotIn('id', $data)->get()->random()->id;

                DB::table('restaurant_consumables')->insert([
                    'restaurant_id' => $rr,
                    'consumable_id' => $randomConsumable,
                    'price' => random_int(1,5),
                    'category' => Consumable::find($randomConsumable)->category
                ]);
            }

            //Side dish
            foreach(range(1,5) as $rrr)
            {               
                //Get all restaurant consumables
                $getCurrentRestaurantConsumables = RestaurantConsumable::where('restaurant_id', $rrr)->where('category', 'side dish')->get();

                //Put ids in array
                $data = [];
                foreach($getCurrentRestaurantConsumables as $g)
                {
                    array_push($data, $g->consumable_id);
                }
                
                //If empty put 0 in array
                if(count($data) == 0)
                {                    
                    $data = [0];
                }

                //Find random id
                $randomConsumable = Consumable::where('category', 'side dish')->whereNotIn('id', $data)->get()->random()->id;

                DB::table('restaurant_consumables')->insert([
                    'restaurant_id' => $rrr,
                    'consumable_id' => $randomConsumable,
                    'price' => random_int(1,5),
                    'category' => Consumable::find($randomConsumable)->category
                ]);
            }

            //Drinks
            foreach(range(1,5) as $rrrr)
            {               
                //Get all restaurant consumables
                $getCurrentRestaurantConsumables = RestaurantConsumable::where('restaurant_id', $rrrr)->where('category', 'drink')->get();

                //Put ids in array
                $data = [];
                foreach($getCurrentRestaurantConsumables as $g)
                {
                    array_push($data, $g->consumable_id);
                }
                
                //If empty put 0 in array
                if(count($data) == 0)
                {                    
                    $data = [0];
                }

                //Find random id
                $randomConsumable = Consumable::where('category', 'drink')->whereNotIn('id', $data)->get()->random()->id;

                DB::table('restaurant_consumables')->insert([
                    'restaurant_id' => $rrrr,
                    'consumable_id' => $randomConsumable,
                    'price' => random_int(1,5),
                    'category' => Consumable::find($randomConsumable)->category
                ]);
            }
        }
    }
}
