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
            $restaurant = Restaurant::with('dishes')->inRandomOrder()->first();
           // dd($restaurant);
            if( count($restaurant->dishes) >0){

                $order->restaurant_id = $restaurant->id;

                            $order->customer_name = $faker->name;
                            $order->customer_address = $faker->address();
                            $order->customer_mail = $faker->unique()->email();
                            $order->customer_phone = $faker->randomNumber(9,true);

                            $order->save();

                            $dishes = Dish::where('id', $order->restaurant->id)->get();
                            $total = 0;
                            foreach ($dishes as $dish) {
                                $n = rand(1,4);

                                    $total += $dish->price * $n;
                                    $order->dishes()->attach([

                                        $dish->id =>[ 'quantity' => $n],
                                      ]);




                                  }

                            $order->total_price = $total;
                            $order->save();
            }else{
                $i--;

            }
        }





    }
}
