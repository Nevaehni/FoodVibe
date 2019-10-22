<?php

use Illuminate\Database\Seeder;
use App\Restaurant;
use App\RestaurantSchedule;
use Carbon\Carbon;

class RestaurantSchedulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        RestaurantSchedule::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        foreach(range(1,5) as $r)
        {
            DB::table('restaurant_schedules')->insert([
                
                'restaurant_id' => $r,
                'closed_from'  => Carbon::Now('Europe/Amsterdam')->addMinute(rand(-5, 5)),
                'closed_till'  => Carbon::Now('Europe/Amsterdam')->addMinute(rand(300, 400))              
            
            ]);
        }
       
        
    }
}
