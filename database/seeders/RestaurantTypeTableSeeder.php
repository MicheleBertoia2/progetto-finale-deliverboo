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
                "name"=> "Locanda Del Convento ",
                "address"=> "Piazzale Trotta, 2",
                "image" => "https://10619-2.s.cdn12.com/rests/original/110_522372635.jpg",
                "description" => "Torna indietro nel tempo e delizia i sapori del fascino del passato alla Locanda Del Convento, in Piazzale Trotta, 2.",
                "id" => 1,
            ],
            [
                "name"=> "Ristorante Coria",
                "address"=> "Via Infermeria 24",
                "image" => "https://axwwgrkdco.cloudimg.io/v7/__gmpics__/65292bb625f0471ba2caa84ceba0dd70",
                "description" => "Vivi una fusione di sapori e creatività al Ristorante Coria, in Via Infermeria 24. Un luogo che sorprende e delizia.",
                "id" => 1,
            ],
            [
                "name"=> "Trattoria Le Rose",
                "address"=> "Piazza Risorgimento 24",
                "image" => "https://media-cdn.tripadvisor.com/media/photo-s/1d/bf/ed/b7/caption.jpg",
                "description" => "Scopri l'essenza dell'ospitalità italiana alla Trattoria Le Rose, su Piazza Risorgimento 24. Un luogo dove calore e sapori si intrecciano.",
                "id" => 1,
            ],
            [
                "name"=> "Ristorante da Bepo",
                "address"=> "Via Praderoni 24",
                "image" => "https://img.italiaonline.it/0WO0N000000IrfUWAS_13646590.JPG",
                "description" => "Delizia i tuoi sensi con un'esperienza culinaria unica al Ristorante da Bepo, inVia Praderoni 24",
                "id" => 1,
            ],
            [
                "name" => "The Sushi House",
                "address" => "Via dei Sushi 1, Milano",
                "image" => "https://images.squarespace-cdn.com/content/v1/5982fa4fe58c62cb28091fa4/1578399820670-9PSKMMZQMBNGFTTTJ9PZ/Pizzeria?format=1000w",
                "id" => 2,
            ],
            [
                "name" => "The Ramen Bar",
                "address" => "Piazza del Ramen 2, Milano",
                "image" => "https://aalsdnxkwq.cloudimg.io/v7/www.mamablip.com/ir/800/storage/trattoria_osteria_3091652187298.jpg",
                "id" => 2,
            ],
            [
                "name" => "Chinese Delight",
                "address" => "Via della Cina 10, Milano",
                "image" => "https://res.cloudinary.com/tf-lab/image/upload/w_600,h_310,c_fill,g_auto:subject,q_auto,f_auto/restaurant/d3512fdf-90d6-42c9-a93d-b218efa5a04c/fd527b04-9a04-4883-8f3d-29a5d11159b8.jpg",
                "id" => 3,
            ],
            [
                "name" => "Golden Dragon",
                "address" => "Via del Drago d'Oro 5, Milano",
                "image" => "https://media-cdn.tripadvisor.com/media/photo-s/0d/3e/9e/16/ristorante-bella-napoli.jpg",
                "id" => 3,
            ],
            [
                "name" => "American Diner",
                "address" => "Via dei Casali 13, Milano",
                "image" => "https://images.dissapore.com/wp-content/uploads/2015/01/trattorie-firenze.jpg",
                "id" => 4,
            ],
            [
                "name" => "Burger Joint",
                "address" => "Via del Bisonte 23, Milano",
                "image" => "https://www.southbeachmagazine.com/wp-content/uploads/2014/05/hosteris1030-678x381.jpg",
                "id" => 4,
            ],
            [
                "name" => "Turkish Delight",
                "address" => "Via Cerignola 20, Milano",
                "image" => "https://uniiti.com//images/shops/logos/logo-425-antica-trattoria-1591029070.png",
                "id" => 5,
            ],
            [
                "name" => "Istanbul Bazaar",
                "address" => "Via Foggia, Milano",
                "image" => "https://10619-2.s.cdn12.com/rests/original/101_509549750.jpg",
                "id" => 5,
            ],
            [
                "name" => "Mexican Grill",
                "address" => "Via del Messico 50, Milano",
                "image" => "https://10619-2.s.cdn12.com/rests/original/109_521519770.jpg",
                "id" => 6,
            ],
            [
                "name" => "El Mariachi",
                "address" => "Via San Severo 15, Milano",
                "image" => "https://mickeyblog.com/wp-content/uploads/2018/10/Trattoria-al-Forno.jpg",
                "id" => 6,
            ],
            [
"name" => "Indian Spice",
                "address" => "Via Portofino 25, Milano",
                "image" => "https://magazine.foodpanda.co.th/wp-content/uploads/sites/14/2017/01/Pizzeria-da-Luigi-2.jpg",
                "id" => 7,
            ],
            [
                "name" => "Taj Mahal",
                "address" => "Via Casalnuovo 28, Milano",
                "image" => "https://media-cdn.tripadvisor.com/media/photo-s/15/3d/ca/b5/by-night.jpg",
                "id" => 7,
            ],
            [
                "name" => "Thai Tastes",
                "address" => "Via dei Sapori Thailandesi 10, Milano",
                "image" => "https://cdn.vox-cdn.com/uploads/chorus_asset/file/2491428/15863072062_250732fa67_h.0.jpg",
                "id" => 8,
            ],
            [
                "name" => "Bangkok Street Food",
                "address" => "Via San Matteo 5, Milano",
                "image" => "https://qul.imgix.net/dbc81b35-7f0e-4bf7-a263-2883ad9dd256/220495_landscape.jpg",
                "id" => 8,
            ],
        ];
        //ciclo tutti i ristoranti  e per ognuno ci  attacco un numero random di  tipologia

        foreach ($restaurants as $restaurant) {
            //$n = rand(1,2);
           // for ($i=0; $i < $n ; $i++) {
                //$type_id = Type::inRandomOrder()->first();
                foreach ($data as $res) {
                    if ($res['name'] == $restaurant['name']) {
                        $type_id = $res['id'];
                    };
                }
                $restaurant->types()->attach($type_id);
           // }
        }
    }
}
