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

        /*$data = [
            [
                    "name" => "Ristorante Italiano",
                    "address"=> "Via Roma 1, Milano",
                    "image" => "https://images.squarespace-cdn.com/content/v1/5982fa4fe58c62cb28091fa4/1578399820670-9PSKMMZQMBNGFTTTJ9PZ/Pizzeria?format=1000w",
                    "description" => "Un affascinante e accogliente ristorante che offre un'autentica esperienza culinaria italiana. La sua ubicazione in Via Roma 1 a Milano assicura un facile accesso.",
            ],
            [
                    "name"=> "Osteria del Gusto",
                    "address"=> "Piazza Duomo 2",
                    "image" => "https://aalsdnxkwq.cloudimg.io/v7/www.mamablip.com/ir/800/storage/trattoria_osteria_3091652187298.jpg",
                    "description" => "Immergiti in un mondo di sapori e delizia il tuo palato all'Osteria del Gusto, situata in Piazza Duomo 2. Un luogo in cui tradizione culinaria e innovazione si incontrano.",
                    ],
            [
                    "name"=> "Trattoria da Mario",
                    "address"=> "Corso Italia 3",
                    "image" => "https://res.cloudinary.com/tf-lab/image/upload/w_600,h_310,c_fill,g_auto:subject,q_auto,f_auto/restaurant/d3512fdf-90d6-42c9-a93d-b218efa5a04c/fd527b04-9a04-4883-8f3d-29a5d11159b8.jpg",
                    "description" => "Scopri l'essenza della cucina italiana alla Trattoria da Mario su Corso Italia 3. Tuffati in un'atmosfera calda e accogliente.",
                    ],
            [
                    "name"=> "Pizzeria Bella Napoli",
                    "address"=> "Viale Montenero 4",
                    "image" => "https://media-cdn.tripadvisor.com/media/photo-s/0d/3e/9e/16/ristorante-bella-napoli.jpg",
                    "description"=>"Prova il vero sapore di Napoli alla Pizzeria Bella Napoli, situata in Viale Montenero 4. Gusta pizze deliziose preparate con amore e tradizione."
                    ],
            [
                    "name"=>  "Ristorante La Cucina",
                    "address"=> "Largo Garibaldi 5",
                    "image" => "https://images.dissapore.com/wp-content/uploads/2015/01/trattorie-firenze.jpg",
                    "description" => "Deliziati in un viaggio gastronomico al Ristorante La Cucina in Largo Garibaldi 5. Un luogo in cui la passione per il cibo si unisce all'arte culinaria.",
                    ],
            [
                    "name"=>  "Ristorante XYZ",
                    "address"=> "Via Example 6",
                    "image" => "https://www.kayak.it/rimg/himg/02/f1/56/expediav2-6550452-c14ebcf3_z-655573.jpg?width=720&height=576&crop=true",
                    "description" => "Goditi una deliziosa avventura culinaria al Ristorante XYZ situato in Via Example 6. Un locale dove ogni piatto racconta una storia unica.",
                    ],
            [
                    "name"=> "Hostaria Romana",
                    "address"=> "Via Milano 7",
                    "image" => "https://www.southbeachmagazine.com/wp-content/uploads/2014/05/hosteris1030-678x381.jpg",
                    "description" => "Assapora i sapori di Roma all'Hostaria Romana, nascosta in Via Milano 7. Una meta invitante per chi cerca autentiche prelibatezze romane.",
                    ],
            [
                    "name"=> "Antica Trattoria",
                    "address"=> "Corso Vittorio Emanuele 8",
                    "image" => "https://uniiti.com//images/shops/logos/logo-425-antica-trattoria-1591029070.png",
                    "description" => "Delizia i tuoi sensi con ricette tradizionali e un'atmosfera rustica all'Antica Trattoria, su Corso Vittorio Emanuele 8.",
                    ],
            [
                    "name"=>  "Kebab Express",
                    "address"=>  "Via della Moscova 9",
                    "image" => "https://10619-2.s.cdn12.com/rests/original/101_509549750.jpg",
                    "description" => "Soddisfa le tue voglie di kebab deliziosi al Kebab Express, comodamente ubicato in Via della Moscova 9.",
                    ],
            [
                    "name"=> "Osteria delle Grazie",
                    "address"=> "Via Dante 10",
                    "image" => "https://10619-2.s.cdn12.com/rests/original/109_521519770.jpg",
                    "description" => "Vivi il fascino dell'ospitalità italiana all'Osteria delle Grazie, in Via Dante 10. Un luogo che incanta con i suoi piatti tradizionali.",
                    ],
            [
                    "name"=> "Trattoria al Forno",
                    "address"=>  "Via Manzoni 11",
                    "image" => "https://mickeyblog.com/wp-content/uploads/2018/10/Trattoria-al-Forno.jpg",
                    "description" => "Percorri i sapori della cucina italiana alla Trattoria al Forno, in Via Manzoni 11. Un luogo che ti accoglie come in famiglia.",
                    ],
            [
                    "name"=> "Pizzeria da Luigi",
                    "address"=> "Corso Buenos Aires 12",
                    "image" => "https://magazine.foodpanda.co.th/wp-content/uploads/sites/14/2017/01/Pizzeria-da-Luigi-2.jpg",
                    "description" => "Scopri l'arte della preparazione della pizza alla Pizzeria da Luigi, su Corso Buenos Aires 12. Una celebrazione dell'heritage culinario di Napoli.",
                    ],
            [
                    "name"=> "Ristorante del Porto",
                    "address"=> "Via della Repubblica 13",
                    "image" => "https://media-cdn.tripadvisor.com/media/photo-s/15/3d/ca/b5/by-night.jpg",
                    "description" => "Intraprendi un viaggio culinario vicino al porto al Ristorante del Porto, su Via della Repubblica 13. Una meta per deliziosi pasti.",
                    ],
            [
                    "name"=> "Sushi Bar",
                    "address"=>  "Via Solferino 14",
                    "image" => "https://cdn.vox-cdn.com/uploads/chorus_asset/file/2491428/15863072062_250732fa67_h.0.jpg",
                    "description" => "Gusta l'eleganza della cucina giapponese allo Sushi Bar, in Via Solferino 14. Un'oasi di sapori freschi e squisiti.",
                    ],
            [
                    "name"=> "Trattoria Palazzina",
                    "address"=> "Viale Monte Nero 15",
                    "image" => "https://qul.imgix.net/dbc81b35-7f0e-4bf7-a263-2883ad9dd256/220495_landscape.jpg",
                    "description" => "Regalati l'essenza dell'ospitalità italiana alla Trattoria Alla Palazzina, in Viale Monte Nero 15. Un luogo in cui ogni pasto racconta una storia.",
                    ],
            [
                    "name"=> "Ristorante la Pergola",
                    "address"=>  "Largo Treves 16",
                    "image" => "https://media-cdn.tripadvisor.com/media/photo-s/1d/7c/1b/5a/ristorante-la-pergola.jpg",
                    "description" => "Cena sotto le stelle al Ristorante la Pergola, in Largo Treves 16. Un'ambientazione incantevole per esperienze culinarie indimenticabili.",
                    ],
            [
                    "name"=> "Osteria da Enzo",
                    "address"=>   "Piazza della Scala 17",
                    "image" => "https://zero-media.s3.amazonaws.com/uploads/2015/05/roma_trattoria_da_enzo_trastevere_3.jpg",
                    "description" => "Immergiti nello spirito dell'Italia all'Osteria da Enzo, su Piazza della Scala 17. Un luogo che celebra la ricchezza della cucina italiana.",
                    ],
            [
                    "name"=> "Locanda Del Convento ",
                    "address"=> "Piazzale Trotta, 2",
                    "image" => "https://10619-2.s.cdn12.com/rests/original/110_522372635.jpg",
                    "description" => "Torna indietro nel tempo e delizia i sapori del fascino del passato alla Locanda Del Convento, in Piazzale Trotta, 2.",
                    ],
            [
                    "name"=> "Ristorante Coria",
                    "address"=> "Via Infermeria 24",
                    "image" => "https://axwwgrkdco.cloudimg.io/v7/__gmpics__/65292bb625f0471ba2caa84ceba0dd70",
                    "description" => "Vivi una fusione di sapori e creatività al Ristorante Coria, in Via Infermeria 24. Un luogo che sorprende e delizia.",
                    ],
            [
                    "name"=> "Pizzeria Napoletana",
                    "address"=> "Via Ponte Vetero 20",
                    "image" => "https://media-cdn.tripadvisor.com/media/photo-s/1d/9b/4d/3d/particolare-della-sala.jpg",
                    "description" => "Concediti l'autenticità della pizza napoletana alla Pizzeria Napoletana, in Via Ponte Vetero 20. Una celebrazione dell'eredità culinaria di Napoli.",
                    ],
            [
                    "name"=> "La Tana Da Mario",
                    "address"=> "Via Vincenzo Monti 21",
                    "image" => "https://media-cdn.tripadvisor.com/media/photo-s/14/70/3e/a5/photo2jpg.jpg",
                    "description" => "Delizia con l'arte culinaria italiana al Ristorante La Tana Da Mario, in Via Vincenzo Monti 21. Un luogo in cui tradizione e innovazione si incontrano.",
                    ],
            [
                    "name"=> "Osteria del Borgo",
                    "address"=> "Viale Premuda 22",
            "image" => "https://media-cdn.tripadvisor.com/media/photo-s/18/1f/d0/aa/osteria-del-borgo-ristorante.jpg",
                    "description" => "Rilassati in un'atmosfera affascinante all'Osteria del Borgo, in Viale Premuda 22. Un luogo in cui i sapori vengono gustati con piacere.",
                    ],
            [
                    "name"=> "Ristorante Sakura",
                    "address"=>  "Via Ruggero Settimo 23",
                    "image" => "https://sakura-restaurant.it/wp-content/uploads/2023/02/sakura-san-giuliano-milanese-1.jpg",
                    "description" => "Intraprendi un viaggio gastronomico attraverso il Giappone al Ristorante Sakura, in Via Ruggero Settimo 23. Un paradiso per gli amanti del sushi.",
                    ],
            [
                    "name"=> "Trattoria Le Rose",
                    "address"=> "Piazza Risorgimento 24",
                    "image" => "https://media-cdn.tripadvisor.com/media/photo-s/1d/bf/ed/b7/caption.jpg",
                    "description" => "Scopri l'essenza dell'ospitalità italiana alla Trattoria Le Rose, su Piazza Risorgimento 24. Un luogo dove calore e sapori si intrecciano.",
                    ],
            [
                    "name"=> "Ristorante da Bepo",
                    "address"=> "Via Praderoni 24",
                    "image" => "https://img.italiaonline.it/0WO0N000000IrfUWAS_13646590.JPG",
                    "description" => "Delizia i tuoi sensi con un'esperienza culinaria unica al Ristorante da Bepo, inVia Praderoni 24",
            ]

            ];*/

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
                    "name"=> "Ristorante La Pergola",
                    "address"=> "Via Roma 10, Milano",
                    "image" => "https://romecavalieri.com/wp-content/uploads/2016/03/La-Pergola-Restaurant-1-e1469604929350.jpg",
                    "description" => "Un'esperienza culinaria unica nel cuore di Milano, presso il Ristorante La Pergola.",
                    "id" => 1,
                ],
                [
                    "name"=> "Osteria del Borgo",
                    "address"=> "Via Dante 20, Milano",
                    "image" => "https://media-cdn.tripadvisor.com/media/photo-s/18/1f/d0/aa/osteria-del-borgo-ristorante.jpg",
                    "description" => "Autentica cucina italiana in un'atmosfera accogliente all'Osteria del Borgo.",
                    "id" => 1,
                ],
                [
                    "name" => "The Sushi House",
                    "address" => "Via dei Sushi 1, Milano",
                    "image" => "https://www.californiabeaches.com/wp-content/uploads/2016/03/lopiano012-1000x668.jpg",
                    "id" => 2,
                ],
                [
                    "name" => "The Ramen Bar",
                    "address" => "Piazza del Ramen 2, Milano",
                    "image" => "https://theramenbar.ie/images/photos/large/28.jpg",
                    "id" => 2,
                ],
                [
                    "name"=> "Sushi Fusion",
                    "address"=> "Via Garibaldi 15, Milano",
                    "image" => "https://portamialsushi.it/wp-content/uploads/2022/03/Iyi-Fusion-Experience-Sushi-Milano.-scaled.jpg",
                    "description" => "Esplora un mix di sapori e tradizioni al Sushi Fusion.",
                    "id" => 2,
                ],
                [
                    "name"=> "Golden Wok",
                    "address"=> "Via Vittorio Emanuele 30, Milano",
                    "image" => "https://media-cdn.tripadvisor.com/media/photo-s/10/46/9c/39/esterno.jpg",
                    "description" => "Un viaggio nei sapori della cucina cinese al Golden Wok.",
                    "id" => 3,
                ],
                [
                    "name" => "Chinese Delight",
                    "address" => "Via della Cina 10, Milano",
                    "image" => "https://media-cdn.tripadvisor.com/media/photo-s/0e/f8/85/c3/chinese-delight.jpg",
                    "id" => 3,
                ],
                [
                    "name" => "Golden Dragon",
                    "address" => "Via del Drago d'Oro 5, Milano",
                    "image" => "https://media-cdn.tripadvisor.com/media/photo-s/03/a6/a4/c7/golden-dragon-chinese.jpg",
                    "id" => 3,
                ],
                [
                    "name" => "American Diner",
                    "address" => "Via dei Casali 13, Milano",
                    "image" => "https://www.1950americandiner.it/media/diners-gallerie/Pontedera_2.jpg",
                    "id" => 4,
                ],
                [
                    "name" => "Burger Joint",
                    "address" => "Via del Bisonte 23, Milano",
                    "image" => "https://static.wixstatic.com/media/6818fc_b9d42479002e4b6d9b64fbe9de3e2b51~mv2.jpg/v1/fill/w_640,h_350,al_t,q_80,usm_0.66_1.00_0.01,enc_auto/6818fc_b9d42479002e4b6d9b64fbe9de3e2b51~mv2.jpg",
                    "id" => 4,
                ],
                [
                    "name"=> "American Grille",
                    "address"=> "Via XX Settembre 5, Milano",
                    "image" => "https://media-cdn.tripadvisor.com/media/photo-s/1b/e2/fd/96/20200828-193003-largejpg.jpg",
                    "description" => "Gustosi piatti americani e un'atmosfera retrò all'American Grille.",
                    "id" => 4,
                ],
                [
                    "name"=> "Turkish Delights",
                    "address"=> "Via Milano 25, Milano",
                    "image" => "https://eatsouthbank.com.au/wp-content/uploads/2015/06/Ahmets_NewShoot_2022_7.jpg",
                    "description" => "I sapori autentici della Turchia vi aspettano ai Turkish Delights.",
                    "id" => 5,
                ],
                [
                    "name" => "Cappadocia",
                    "address" => "Via Cerignola 20, Milano",
                    "image" => "https://upload.wikimedia.org/wikipedia/commons/thumb/7/76/Cappadocia_Turkish_Restaurant.jpg/640px-Cappadocia_Turkish_Restaurant.jpg",
                    "id" => 5,
                ],
                [
                    "name" => "Meydan",
                    "address" => "Via Foggia, Milano",
                    "image" => "https://meydan-kebap.com/wp-content/uploads/2021/03/IMG_4364.jpg",
                    "id" => 5,
                ],
                [
                    "name" => "Mexican Grill",
                    "address" => "Via del Messico 50, Milano",
                    "image" => "https://media-cdn.tripadvisor.com/media/photo-s/13/97/43/ea/front-entrance.jpg",
                    "id" => 6,
                ],
                [
                    "name" => "El Mariachi",
                    "address" => "Via San Severo 15, Milano",
                    "image" => "https://media-cdn.tripadvisor.com/media/photo-s/07/41/2f/34/exterior.jpg",
                    "id" => 6,
                ],
                [
                    "name"=> "Mexican Cantina",
                    "address"=> "Via Napoli 10, Milano",
                    "image" => "https://www.lauraperuchi.com/wp-content/uploads/2017/02/32760965701_14fa5221d1_c.jpg",
                    "description" => "Autentici sapori messicani in un'atmosfera festosa al Mexican Cantina.",
                    "id" => 6,
                ],
                [
                    "name" => "Indian Spice",
                    "address" => "Via Portofino 25, Milano",
                    "image" => "https://welcomesaudi.com/uploads/0000/64/2021/10/11/1-indian-spices-restaurant-jeddah.jpg",
                    "id" => 7,
                ],
                [
                    "name" => "Taj Mahal",
                    "address" => "Via Casalnuovo 28, Milano",
                    "image" => "https://media-cdn.tripadvisor.com/media/photo-s/11/25/46/27/taj-mahal-restaurant.jpg",
                    "id" => 7,
                ],
                [
                    "name"=> "Bangkok Street",
                    "address"=> "Via Padova 22, Milano",
                    "image" => "https://media-cdn.tripadvisor.com/media/photo-s/1a/b6/0d/a4/mat.jpg",
                    "description" => "Esplora le autentiche delizie thailandesi al Bangkok Street.",
                    "id" => 8,
                ],
                [
                    "name" => "Thai Taste",
                    "address" => "Via dei Sapori Thailandesi 10, Milano",
                    "image" => "https://media.timeout.com/images/104681299/image.jpg",
                    "id" => 8,
                ],
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

