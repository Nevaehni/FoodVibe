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

        $food[0] =
        [
            'kebab.webp',
            'salmon_mango.png',
            'mountain_dew.png',
            'turkey_pasaman_cheese.png',
            'chicken_mix.webp',
            'grass_taco_bowl.png',
            'chicken_bowl.png',
            'Pasta.png',
            'pide.png',
            'beef_pasta.png',
            'gezonde_bak.png',
        ];

        $food[1] =
        [
            'corn.png',
            'manti.png',
            'sarma.png',
            'classic-burrito.png',
            'soft-burrito.png',
            'chicken nuggets.png',
            'onion_rings.png',
        ];

        $food[2] =
        [
            'frutea.png',
            '7up.png',
            'mountain_dew.png',
            'fanta.png',
            'fristi.webp',
            'coca_cola.webp',
            'sprite.png',
        ];

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Consumable::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
       
        foreach($food[0] as $f)
        {
            DB::table('consumables')->insert([
                'title' => preg_replace('/[^A-Za-z0-9.]/', " ", ucfirst(explode(".", $f, 2)[0])),
                'category' => 'main course',
                'image' => $f,
            ]);
        }

        foreach($food[1] as $f)
        {
            DB::table('consumables')->insert([
                'title' => preg_replace('/[^A-Za-z0-9.]/', " ", ucfirst(explode(".", $f, 2)[0])),
                'category' => 'side dish',
                'image' => $f,
            ]);
        }

        foreach($food[2] as $f)
        {
            DB::table('consumables')->insert([
                'title' => preg_replace('/[^A-Za-z0-9.]/', " ", ucfirst(explode(".", $f, 2)[0])),
                'category' => 'drink',
                'image' => $f,
            ]);
        }
      
    }
}
