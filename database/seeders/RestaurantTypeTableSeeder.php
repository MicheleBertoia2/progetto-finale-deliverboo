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

        $data = [
            [
                "restaurant_id" => 1,
                "type_id" => 1
            ],
            [
                "restaurant_id" => 2,
                "type_id" => 1
            ],
            [
                "restaurant_id" => 2,
                "type_id" => 8
            ],
            [
                "restaurant_id" => 3,
                "type_id" => 1
            ],
            [
                "restaurant_id" => 4,
                "type_id" => 1
            ],
            [
                "restaurant_id" => 5,
                "type_id" => 1
            ],
            [
                "restaurant_id" => 5,
                "type_id" => 3
            ],
            [
                "restaurant_id" => 6,
                "type_id" => 1
            ],
            [
                "restaurant_id" => 7,
                "type_id" => 2
            ],
            [
                "restaurant_id" => 8,
                "type_id" => 2
            ],
            [
                "restaurant_id" => 9,
                "type_id" => 2
            ],
            [
                "restaurant_id" => 9,
                "type_id" => 3
            ],
            [
                "restaurant_id" => 9,
                "type_id" => 1
            ],
            [
                "restaurant_id" => 10,
                "type_id" => 3
            ],
            [
                "restaurant_id" => 11,
                "type_id" => 3
            ],
            [
                "restaurant_id" => 12,
                "type_id" => 3
            ],
            [
                "restaurant_id" => 12,
                "type_id" => 4
            ],
            [
                "restaurant_id" => 13,
                "type_id" => 4
            ],
            [
                "restaurant_id" => 14,
                "type_id" => 4
            ],
            [
                "restaurant_id" => 15,
                "type_id" => 4
            ],
            [
                "restaurant_id" => 16,
                "type_id" => 5
            ],
            [
                "restaurant_id" => 17,
                "type_id" => 5
            ],
            [
                "restaurant_id" => 17,
                "type_id" => 1
            ],
            [
                "restaurant_id" => 18,
                "type_id" => 5
            ],
            [
                "restaurant_id" => 19,
                "type_id" => 6
            ],
            [
                "restaurant_id" => 20,
                "type_id" => 6
            ],
            [
                "restaurant_id" => 21,
                "type_id" => 6
            ],
            [
                "restaurant_id" => 21,
                "type_id" => 1
            ],
            [
                "restaurant_id" => 22,
                "type_id" => 7
            ],
            [
                "restaurant_id" => 23,
                "type_id" => 7
            ],
            [
                "restaurant_id" => 24,
                "type_id" => 8
            ],
            [
                "restaurant_id" => 25,
                "type_id" => 8
            ],
            [
                "restaurant_id" => 25,
                "type_id" => 3
            ]

        ];

            foreach ($data as $res ) {
                $res_id =  $res["restaurant_id"];

                foreach ($restaurants as $restaurant) {
                    if ($restaurant->id == $res_id) {
                        $restaurant->types()->attach($res['type_id']);
                    }
                }
            } // }
        }
    }
