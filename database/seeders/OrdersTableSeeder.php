<?php

namespace Database\Seeders;

use App\Models\Dish;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // $restaurants = Restaurant::with(['dishes'])->get();
        for ($i=1; $i < 5 ; $i++) {
            $order = new Order();
            $order->restaurant_id = Restaurant::inRandomOrder()->first()->id;
            // $dishes = Dish::where('id', $order->restaurant_id);
            // dd(is_array($dishes));
            $n = rand(1,10);
            $total = 0;
            for ($i=0; $i < $n ; $i++) {
                $dish = Dish::where('id', $order->restaurant_id)->inRandomOrder()->first();
                $total += $dish?->price;
            }
            // dd($total);
            $order->total_price = $total;
            $order->customer_name = $faker->name;
            $order->customer_address = $faker->address();
            $order->customer_mail = $faker->unique()->email();
            $order->customer_phone = $faker->randomNumber(9,true);
            $order->save();

        }
    }
}
