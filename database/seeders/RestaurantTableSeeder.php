<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Support\Str;


class RestaurantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker){

        $data = [
            [
                    "name" => "Ristorante Italiano",
                    "address"=> "Via Roma 1, Milano",
                    "image" => "https://img.grouponcdn.com/deal/m1kgC9NYdgyitDE6ZXUV/Pa-700x420/v1/t600x362.jpg"
            ],
            [
                    "name"=> "Osteria del Gusto",
                    "address"=> "Piazza Duomo 2",
                    "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTfWtXcG_Oie5DT_tmIkCXUGblgWfGF7eaVYg&usqp=CAU"
                    ],
            [
                    "name"=> "Trattoria da Mario",
                    "address"=> "Corso Italia 3",
                    "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQzJfzFjVVumyxfxiNZNAF6NmTKPm5IgOOQgA&usqp=CAU"
                    ],
            [
                    "name"=> "Pizzeria Bella Napoli",
                    "address"=> "Viale Montenero 4",
                    "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTAHdYuFPGgfBr5KneMTGwoYtrQGFl_L0qwkg&usqp=CAU"
                    ],
            [
                    "name"=>  "Ristorante La Cucina",
                    "address"=> "Largo Garibaldi 5",
                    "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ1eeFiOGqGmZUo8K9yaw3yDi-YV4vH37a-Nw&usqp=CAU"
                    ],
            [
                    "name"=>  "Ristorante XYZ",
                    "address"=> "Via Example 6",
                    "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQT_jBbbN4KZinxY20AdSCYPi5Hx3bTk8zOTg&usqp=CAU"
                    ],
            [
                    "name"=> "Hostaria Romana",
                    "address"=> "Via Milano 7",
                    "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSFnMKfnChQQB33QtuY_geNsxUzVVWjHRqHlw&usqp=CAU"
                    ],
            [
                    "name"=> "Antica Trattoria",
                    "address"=> "Corso Vittorio Emanuele 8",
                    "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRD6eKjf1ceenwYPLNYLVYrEXUEVkDO9PB0VQ&usqp=CAU"
                    ],
            [
                    "name"=>  "Kebab Express",
                    "address"=>  "Via della Moscova 9",
                    "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSjtVOr0Gr2y4_wb22DjiZjyugLOrVYZJtaQg&usqp=CAU"
                    ],
            [
                    "name"=> "Osteria delle Grazie",
                    "address"=> "Via Dante 10",
                    "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQRIo6AZ3g4V6K2ZsLT2f0dDTH1AnIsLzpx2w&usqp=CAU"
                    ],
            [
                    "name"=> "Trattoria al Forno",
                    "address"=>  "Via Manzoni 11",
                    "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTok34xcEV2_4cNysd09GKTzPSgUOBoKEr2Sw&usqp=CAU"
                    ],
            [
                    "name"=> "Pizzeria da Luigi",
                    "address"=> "Corso Buenos Aires 12",
                    "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT7QJx-oNR9mY-VgY8gJzT17xidGVM-I6X5Og&usqp=CAU"
                    ],
            [
                    "name"=> "Ristorante del Porto",
                    "address"=> "Via della Repubblica 13",
                    "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRhRmIrPPlT9RvNrIqUYxDlJwLxXAAClF_8_w&usqp=CAU"
                    ],
            [
                    "name"=> "Sushi Bar",
                    "address"=>  "Via Solferino 14",
                    "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTopom8OIZLVPQ8eTH2RuAIWdD2v3EMKsWcUQ&usqp=CAU"
                    ],
            [
                    "name"=> "Pasticceria Fantasia",
                    "address"=> "Viale Monte Nero 15",
                    "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSCTi7qSLx61n8QPTQ7J7KXFpfODefKNfMEaQ&usqp=CAU"
                    ],
            [
                    "name"=> "Ristorante la Pergola",
                    "address"=>  "Largo Treves 16",
                    "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTsFdfOxq0cGamYG0sVM6_xGKNAgovlli9lIQ&usqp=CAU"
                    ],
            [
                    "name"=> "Osteria da Enzo",
                    "address"=>   "Piazza della Scala 17",
                    "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQRIo6AZ3g4V6K2ZsLT2f0dDTH1AnIsLzpx2w&usqp=CAU"
                    ],
            [
                    "name"=> "Ristorante La Brace",
                    "address"=> "Via Turati 18",
                    "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQsBh28Kul6JeVfVPXP2ddZtHHLs2UpZ2-wYg&usqp=CAU"
                    ],
            [
                    "name"=> "Trattoria ai 4 Venti",
                    "address"=> "Corso Magenta 19",
                    "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQRIo6AZ3g4V6K2ZsLT2f0dDTH1AnIsLzpx2w&usqp=CAU"
                    ],
            [
                    "name"=> "Pizzeria Napoletana",
                    "address"=> "Via Ponte Vetero 20",
                    "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTs-tnvR-ZsW6XVSkZCPVB8J97MLmELiPjgZg&usqp=CAU"
                    ],
            [
                    "name"=> "Ristorante da Giovanni",
                    "address"=> "Via Vincenzo Monti 21",
                    "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSuNvQYwOJZi29NVr20_973ivsoSMUGgF6b8w&usqp=CAU"
                    ],
            [
                    "name"=> "Osteria del Borgo",
                    "address"=> "Viale Premuda 22",
                    "image" => "https://img.grouponcdn.com/deal/m1kgC9NYdgyitDE6ZXUV/Pa-700x420/v1/t600x362.jpg"
                    ],
            [
                    "name"=> "Ristorante Sakura",
                    "address"=>  "Via Ruggero Settimo 23",
                    "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQi5l164Y2ytjSe5xNQuD-60yvtYMOATXewwg&usqp=CAU"
                    ],
            [
                    "name"=> "Trattoria Le Rose",
                    "address"=> "Piazza Risorgimento 24",
                    "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTryboSwFmX1XsemYk2cHLpI2kj-Ews_33QgQ&usqp=CAU"
                    ],
            [
                    "name"=> "Pizzeria Rosa Blu",
                    "address"=> "Viale Abruzzi 25",
                    "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTiLxmZ7hOXvXEeCaQxfestTbyXxZxrRA740Q&usqp=CAU"
            ]

            ];
            $users = User::all();
        foreach ($data as $index=>$restaurant){
            $new_restaurant = New Restaurant();
            $new_restaurant->name = $restaurant['name'];
            $new_restaurant->user_id  = $users[$index]->id;
            $new_restaurant->address = $restaurant['address'];
            $new_restaurant->slug = Restaurant::generateSlug($new_restaurant->name);
            $new_restaurant->image = $restaurant['image'];
            $new_restaurant->vat_number = $faker->randomNumber(9, true);
            $new_restaurant->save();
        }
    }
}

