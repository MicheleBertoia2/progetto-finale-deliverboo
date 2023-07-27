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
                    "image" => "https://images.squarespace-cdn.com/content/v1/5982fa4fe58c62cb28091fa4/1578399820670-9PSKMMZQMBNGFTTTJ9PZ/Pizzeria?format=1000w"
            ],
            [
                    "name"=> "Osteria del Gusto",
                    "address"=> "Piazza Duomo 2",
                    "image" => "https://aalsdnxkwq.cloudimg.io/v7/www.mamablip.com/ir/800/storage/trattoria_osteria_3091652187298.jpg"
                    ],
            [
                    "name"=> "Trattoria da Mario",
                    "address"=> "Corso Italia 3",
                    "image" => "https://res.cloudinary.com/tf-lab/image/upload/w_600,h_310,c_fill,g_auto:subject,q_auto,f_auto/restaurant/d3512fdf-90d6-42c9-a93d-b218efa5a04c/fd527b04-9a04-4883-8f3d-29a5d11159b8.jpg"
                    ],
            [
                    "name"=> "Pizzeria Bella Napoli",
                    "address"=> "Viale Montenero 4",
                    "image" => "https://media-cdn.tripadvisor.com/media/photo-s/0d/3e/9e/16/ristorante-bella-napoli.jpg"
                    ],
            [
                    "name"=>  "Ristorante La Cucina",
                    "address"=> "Largo Garibaldi 5",
                    "image" => "https://images.dissapore.com/wp-content/uploads/2015/01/trattorie-firenze.jpg"
                    ],
            [
                    "name"=>  "Ristorante XYZ",
                    "address"=> "Via Example 6",
                    "image" => "https://www.kayak.it/rimg/himg/02/f1/56/expediav2-6550452-c14ebcf3_z-655573.jpg?width=720&height=576&crop=true"
                    ],
            [
                    "name"=> "Hostaria Romana",
                    "address"=> "Via Milano 7",
                    "image" => "https://www.southbeachmagazine.com/wp-content/uploads/2014/05/hosteris1030-678x381.jpg"
                    ],
            [
                    "name"=> "Antica Trattoria",
                    "address"=> "Corso Vittorio Emanuele 8",
                    "image" => "https://uniiti.com//images/shops/logos/logo-425-antica-trattoria-1591029070.png"
                    ],
            [
                    "name"=>  "Kebab Express",
                    "address"=>  "Via della Moscova 9",
                    "image" => "https://10619-2.s.cdn12.com/rests/original/101_509549750.jpg"
                    ],
            [
                    "name"=> "Osteria delle Grazie",
                    "address"=> "Via Dante 10",
                    "image" => "https://10619-2.s.cdn12.com/rests/original/109_521519770.jpg"
                    ],
            [
                    "name"=> "Trattoria al Forno",
                    "address"=>  "Via Manzoni 11",
                    "image" => "https://mickeyblog.com/wp-content/uploads/2018/10/Trattoria-al-Forno.jpg"
                    ],
            [
                    "name"=> "Pizzeria da Luigi",
                    "address"=> "Corso Buenos Aires 12",
                    "image" => "https://magazine.foodpanda.co.th/wp-content/uploads/sites/14/2017/01/Pizzeria-da-Luigi-2.jpg"
                    ],
            [
                    "name"=> "Ristorante del Porto",
                    "address"=> "Via della Repubblica 13",
                    "image" => "https://media-cdn.tripadvisor.com/media/photo-s/15/3d/ca/b5/by-night.jpg"
                    ],
            [
                    "name"=> "Sushi Bar",
                    "address"=>  "Via Solferino 14",
                    "image" => "https://cdn.vox-cdn.com/uploads/chorus_asset/file/2491428/15863072062_250732fa67_h.0.jpg"
                    ],
            [
                    "name"=> "Trattoria Alla Palazzina",
                    "address"=> "Viale Monte Nero 15",
                    "image" => "https://qul.imgix.net/dbc81b35-7f0e-4bf7-a263-2883ad9dd256/220495_landscape.jpg"
                    ],
            [
                    "name"=> "Ristorante la Pergola",
                    "address"=>  "Largo Treves 16",
                    "image" => "https://media-cdn.tripadvisor.com/media/photo-s/1d/7c/1b/5a/ristorante-la-pergola.jpg"
                    ],
            [
                    "name"=> "Osteria da Enzo",
                    "address"=>   "Piazza della Scala 17",
                    "image" => "https://zero-media.s3.amazonaws.com/uploads/2015/05/roma_trattoria_da_enzo_trastevere_3.jpg"
                    ],
            [
                    "name"=> "Locanda Del Convento ",
                    "address"=> "Via Turati 18",
                    "image" => "https://10619-2.s.cdn12.com/rests/original/110_522372635.jpg"
                    ],
            [
                    "name"=> "Ristorante Coria",
                    "address"=> "Corso Magenta 19",
                    "image" => "https://axwwgrkdco.cloudimg.io/v7/__gmpics__/65292bb625f0471ba2caa84ceba0dd70"
                    ],
            [
                    "name"=> "Pizzeria Napoletana",
                    "address"=> "Via Ponte Vetero 20",
                    "image" => "https://media-cdn.tripadvisor.com/media/photo-s/1d/9b/4d/3d/particolare-della-sala.jpg"
                    ],
            [
                    "name"=> "Ristorante da Giovanni",
                    "address"=> "Via Vincenzo Monti 21",
                    "image" => "https://www.repstatic.it/content/contenthub/img/2021/11/10/113709586-17965d10-2457-45ea-b17f-119b9bed9fe3.jpg"
                    ],
            [
                    "name"=> "Osteria del Borgo",
                    "address"=> "Viale Premuda 22",
                    "image" => "https://media-cdn.tripadvisor.com/media/photo-s/18/1f/d0/aa/osteria-del-borgo-ristorante.jpg"
                    ],
            [
                    "name"=> "Ristorante Sakura",
                    "address"=>  "Via Ruggero Settimo 23",
                    "image" => "https://sakura-restaurant.it/wp-content/uploads/2023/02/sakura-san-giuliano-milanese-1.jpg"
                    ],
            [
                    "name"=> "Trattoria Le Rose",
                    "address"=> "Piazza Risorgimento 24",
                    "image" => "https://media-cdn.tripadvisor.com/media/photo-s/1d/bf/ed/b7/caption.jpg"
                    ],
            [
                    "name"=> "Ristorante da Bepo",
                    "address"=> "Viale Abruzzi 25",
                    "image" => "https://img.italiaonline.it/0WO0N000000IrfUWAS_13646590.JPG"
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

