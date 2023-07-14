<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurants = Restaurant::all();

        //ciclo tutti i ristoranti  e per ognuno ci  attacco un numero random di  tipologia

        foreach ($restaurants as $restaurant) {
            $n = rand(1,2);
            for ($i=0; $i < $n ; $i++) {
                $type_id = Type::inRandomOrder()->first();
                $restaurant->types()->attach($type_id);
            }
        }
    }
}
