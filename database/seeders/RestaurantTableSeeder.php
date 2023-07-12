<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Restaurant;
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
                    "address"=> "Via Roma 1, Milano"
            ],
            [
                    "name"=> "Osteria del Gusto",
                    "address"=> "Piazza Duomo 2"
                    ],
            [
                    "name"=> "Trattoria da Mario",
                    "address"=> "Corso Italia 3"
                    ],
            [
                    "name"=> "Pizzeria Bella Napoli",
                    "address"=> "Viale Montenero 4"
                    ],
            [
                    "name"=>  "Ristorante La Cucina",
                    "address"=> "Largo Garibaldi 5"
                    ],
            [
                    "name"=>  "Ristorante XYZ",
                    "address"=> "Via Example 6"
                    ],
            [
                    "name"=> "Hostaria Romana",
                    "address"=> "Via Milano 7"
                    ],
            [
                    "name"=> "Antica Trattoria",
                    "address"=> "Corso Vittorio Emanuele 8"
                    ],
            [
                    "name"=>  "Kebab Express",
                    "address"=>  "Via della Moscova 9"
                    ],
            [
                    "name"=> "Osteria delle Grazie",
                    "address"=> "Via Dante 10"
                    ],
            [
                    "name"=> "Trattoria al Forno",
                    "address"=>  "Via Manzoni 11"
                    ],
            [
                    "name"=> "Pizzeria da Luigi",
                    "address"=> "Corso Buenos Aires 12"
                    ],
            [
                    "name"=> "Ristorante del Porto",
                    "address"=> "Via della Repubblica 13"
                    ],
            [
                    "name"=> "Sushi Bar",
                    "address"=>  "Via Solferino 14"
                    ],
            [
                    "name"=> "Pasticceria Fantasia",
                    "address"=> "Viale Monte Nero 15"
                    ],
            [
                    "name"=> "Ristorante la Pergola",
                    "address"=>  "Largo Treves 16"
                    ],
            [
                    "name"=> "Osteria da Enzo",
                    "address"=>   "Piazza della Scala 17"
                    ],
            [
                    "name"=> "Ristorante La Brace",
                    "address"=> "Via Turati 18"
                    ],
            [
                    "name"=> "Trattoria ai 4 Venti",
                    "address"=> "Corso Magenta 19"
                    ],
            [
                    "name"=> "Pizzeria Napoletana",
                    "address"=> "Via Ponte Vetero 20"
                    ],
            [
                    "name"=> "Ristorante da Giovanni",
                    "address"=> "Via Vincenzo Monti 21"
                    ],
            [
                    "name"=> "Osteria del Borgo",
                    "address"=> "Viale Premuda 22"
                    ],
            [
                    "name"=> "Ristorante Sakura",
                    "address"=>  "Via Ruggero Settimo 23"
                    ],
            [
                    "name"=> "Trattoria Le Rose",
                    "address"=> "Piazza Risorgimento 24"
                    ],
            [
                    "name"=> "Pizzeria Rosa Blu",
                    "address"=> "Viale Abruzzi 25"
            ]

            ];

        foreach ($data as $restaurant){
            $new_restaurant = New Restaurant();
            $new_restaurant->name = $restaurant['name'];
            $new_restaurant->address = $restaurant['address'];
            $new_restaurant->slug = Restaurant::generateSlug($new_restaurant->name);
            $new_restaurant->vat_number = $faker->randomNumber(9, true);
            $new_restaurant->save();
        }
    }
}

