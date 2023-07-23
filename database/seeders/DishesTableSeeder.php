<?php

namespace Database\Seeders;

use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 20; $i++) {
            //recuperro una ricetta di  un piatto  a random da questa api
            $url = 'https://www.themealdb.com/api/json/v1/1/random.php';
            $data = json_decode(file_get_contents($url)) ;
            $food = $data->meals[0];
            //uso i dati  per  popolare la tabella dei piatti
            $dish = new Dish();
            $dish->restaurant_id = Restaurant::inRandomOrder()->first()->id;
            $dish->name = $food->strMeal;
            $dish->slug  = Dish::generateSlug($dish->name);
            //* per le immagini prese dall'API
            $dish->image_path = $food->strMealThumb;
            // oppure se c'è bisogno di un controllo
            // if(strpos($food->strMealThumb, 'https://') || strpos($food->strMealThumb, 'http://')){
                // per le immagini prese dall'API
                //     $dish->image_path = $food->strMealThumb;
            // }
            // prima
            //     $dish->image_path = Storage::url('uploads/'. $food->strMealThumb);
            $dish->price  = rand(1,40) + (rand(0,100)/100);

            $dish->ingredients = $food->strIngredient1 . ', ' . $food->strIngredient2  . ', ' . $food->strIngredient3 . ', ' . $food->strIngredient4 ;
            $dish->vote = rand(1,5);
            $dish->description  = 'descrizione prodotto';
            $dish->is_visible  = true;
            $dish->save();
        }


    }
}
