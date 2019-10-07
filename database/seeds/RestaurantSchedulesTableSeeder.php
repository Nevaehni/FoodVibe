<?php

use Illuminate\Database\Seeder;
use App\Restaurant;
use App\Restaurant_schedule;
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
        Restaurant_schedule::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        $date = Carbon::create(2019, 1, 10, 0, 0, 0);
        DB::table('restaurant_schedules')->insert([

            'restaurant_id' => 1,
            'open_time'  => Carbon::now()->subMinutes(rand(1, 300)),
            'close_time'  => Carbon::now()->addMinute(rand(300, 400))              
        
        ]);

        DB::table('restaurant_schedules')->insert([

            'restaurant_id' => 2,
            'open_time'  => Carbon::now()->subMinute(rand(1, 40)),
            'close_time'  => Carbon::now()->addMinute(rand(40, 60))              
        
        ]);
        
        DB::table('restaurant_schedules')->insert([

            'restaurant_id' => 3,
            'open_time'  => Carbon::now()->subMinutes(rand(1, 10)),
            'close_time'  => Carbon::now()->addMinute(rand(10, 80))              
        
        ]);

        DB::table('restaurant_schedules')->insert([

            'restaurant_id' => 4,
            'open_time'  => Carbon::now()->subMinute(rand(1, 60)),
            'close_time'  => Carbon::now()->addMinute(rand(60, 80))              
        
        ]);
        DB::table('restaurant_schedules')->insert([

            'restaurant_id' => 5,
            'open_time'  => Carbon::now()->subMinute(rand(1, 40)),
            'close_time'  => Carbon::now()->addMinute(rand(40, 50))              
        
        ]);
        
    }
}
