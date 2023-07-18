<?php

namespace Database\Seeders;

use App\Models\Dish;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurants = Restaurant::with(['dishes'])->get();
        for ($i=0; $i < 30 ; $i++) {
            $order = new Order();
            $order->restaurant_id = Restaurant::inRandomOrder()->first()->id;
            // $dishes = Dish::where('id', $order->restaurant_id);
            // dd(is_array($dishes));
            $n = rand(1,10);
            $total = 0;
            for ($i=0; $i < $n ; $i++) {
                $dish = Dish::where('id', $order->restaurant_id)->inRandomOrder()->first();
                $total += $dish->price;
            }
            dd($total);
        }
    }
}
