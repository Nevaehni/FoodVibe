<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {       
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('users')->insert([
            'name' => 'Sebahattin Erzincan',
            'address' => 'Lucasstraat 18H',
            'zipcode' => '1052GF',
            'city' => 'amsterdam',
            'phone' => '0611223344',
            'email' => '341089@talnet.nl',
            'password' => bcrypt('123456789')
        ]);

        DB::table('users')->insert([
            'name' => 'Cosmos Dropos',
            'address' => 'Lucasstraat 18-1',
            'zipcode' => '1052GF',
            'city' => 'amsterdam',
            'phone' => '0655667788',
            'email' => '123456789@talnet.nl',
            'password' => bcrypt('123456789')
        ]);
      
    }
}
