<?php

use Illuminate\Database\Seeder;
use App\Restaurant;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Restaurant::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('restaurants')->insert([
            'title' => 'The Noodle Bar',
            'address' => 'Sinterstraat 34',
            'zipcode' => '1048YG',
            'image' => 'thenoodlebar.png',
            'city' => 'amsterdam',
            'phone' => '0612345678',
            'email' => 'thenoodlebar@talnet.nl',
            'user_id' => '2',
        ]);

        DB::table('restaurants')->insert([
            'title' => 'Istanbul Restaurant',
            'address' => 'Turkijestraat 11',
            'zipcode' => '1011TR',
            'image' => 'istanbul.png',
            'city' => 'Rotterdam',
            'phone' => '0644551122',
            'email' => 'isntanbulrestaurant@talnet.nl'
        ]);

        DB::table('restaurants')->insert([
            'title' => 'Adventurino',
            'address' => 'Turkijestraat 11',
            'zipcode' => '1011TR',
            'image' => 'adventurino.jpg',
            'city' => 'Rotterdam',
            'phone' => '0644551122',
            'email' => 'isntandbulrestaurant@talnet.nl'
        ]);

        DB::table('restaurants')->insert([
            'title' => 'La Farina',
            'address' => 'italiëlaan 43',
            'zipcode' => '1015TF',
            'image' => 'lafarina.png',
            'city' => 'Amsterdam',
            'phone' => '0641298452',
            'email' => 'lafarina@talnet.nl'
        ]);

        DB::table('restaurants')->insert([
            'title' => 'Campus Cafe',
            'address' => 'vissenhofstraat 44',
            'zipcode' => '1078HF',
            'image' => 'campuscafe.jpg',
            'city' => 'Groningen',
            'phone' => '0633447711',
            'email' => 'campuscafe@talnet.nl'
        ]);
    }
}
