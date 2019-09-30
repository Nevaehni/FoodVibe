<?php

use Illuminate\Database\Seeder;
use App\Consumable;

class ConsumablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Consumable::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('consumables')->insert([
            'title' => 'Coca Cola',
            'category' => 'drink',
            'image' => 'coca_cola.webp',
        ]);

        DB::table('consumables')->insert([
            'title' => 'Fristi',
            'category' => 'drink',
            'image' => 'fristi.webp',
        ]);

        DB::table('consumables')->insert([
            'title' => 'Fanta',
            'category' => 'drink',
            'image' => 'fanta.png',
        ]);
    }
}
