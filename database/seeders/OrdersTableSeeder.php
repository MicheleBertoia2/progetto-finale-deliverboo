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
        for ($i=1; $i < 10 ; $i++) {
            $order = new Order();
            $restaurant = Restaurant::inRandomOrder()->with('dishes')->first();
            $order->restaurant_id = $restaurant->id;
            $dishes = $restaurant->dishes;
            // dd($restaurant->dishes);
            if($dishes){
                $total = 0;
                foreach ($dishes as $dish) {
                    $n = rand(0,4);
                    if(!$n === 0){
                        $total += $dish->price * $n;
                        $order->dishes()->attach([$dish->id, 'quantity' => 2]);
                    }
                }
            }else{
                $i--;
            }
            $order->total_price = $total;
            $order->customer_name = $faker->name;
            $order->customer_address = $faker->address();
            $order->customer_mail = $faker->unique()->email();
            $order->customer_phone = $faker->randomNumber(9,true);
           // dd($order->dishes);
            $order->save();

        }
    }
}
