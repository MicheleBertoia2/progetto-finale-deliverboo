<?php

namespace Database\Seeders;

use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Handler\CurlHandler;

class DishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Percorso del certificato CA
        $caCertPath = "C:\Users\Giacomo\Documents\cacert(2).pem";

        // HandlerStack con cURL personalizzato per utilizzare il certificato CA
        $handlerStack = HandlerStack::create(new CurlHandler());
        $client = new Client(['handler' => $handlerStack, 'verify' => $caCertPath]);

        for ($i = 0; $i < 40; $i++) {
            // Recupero una ricetta di un piatto a random da questa API
            $url = 'https://www.themealdb.com/api/json/v1/1/random.php';
            $data = json_decode(file_get_contents($url));
            $food = $data->meals[0];

            // Uso i dati per popolare la tabella dei piatti
            $dish = new Dish();
            $dish->restaurant_id = Restaurant::inRandomOrder()->first()->id;

            // Traduzione del nome del piatto in italiano
            $dish->name = $this->translateText($food->strMeal, 'en', 'it', $client);

            $dish->slug = Dish::generateSlug($dish->name);
            $dish->image_path = $food->strMealThumb;
            $dish->price = rand(1, 40) + (rand(0, 100) / 100);

            // Traduzione degli ingredienti in italiano
            $ingredients = [
                $food->strIngredient1, $food->strIngredient2,
                $food->strIngredient3, $food->strIngredient4
            ];

            $translated_ingredients = [];
            foreach ($ingredients as $ingredient) {
                if (!empty($ingredient)) {
                    $translated_ingredients[] = $this->translateText($ingredient, 'en', 'it', $client);
                }
            }

            $dish->ingredients = implode(', ', $translated_ingredients);

            $dish->vote = rand(1, 5);
            $dish->description = 'descrizione prodotto';
            $dish->is_visible = true;
            $dish->save();
        }
    }

    // Funzione per tradurre testo con l'API di MyMemory Translation
    private function translateText($text, $sourceLang, $targetLang, $client)
    {
        $url = 'https://api.mymemory.translated.net/get';
        $response = $client->get($url, [
            'query' => [
                'q' => $text,
                'langpair' => $sourceLang . '|' . $targetLang
            ]
        ]);

        $result = json_decode($response->getBody(), true);

        if (isset($result['responseData']['translatedText'])) {
            return $result['responseData']['translatedText'];
        }

        return $text;
    }
}
