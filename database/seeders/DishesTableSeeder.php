<?php

namespace Database\Seeders;

use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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

            $url = 'https://www.themealdb.com/api/json/v1/1/random.php';
           $data = json_decode(file_get_contents($url)) ;
           $food = $data->meals[0];
           $dish = new Dish();
           $dish->user_id = Restaurant::inRandomOrder()->first()->id;
           $dish->name = $food->strMeal;
           $dish->slug  = Dish::generateSlug($dish->name);
           $dish->image_path = $food->strMealThumb;
           $dish->price  = rand(1,40) + (rand(0,100)/100);

            $dish->ingredients = $food->strIngredient1 . ', ' . $food->strIngredient2  . ', ' . $food->strIngredient3 . ', ' . $food->strIngredient4 ;
            $dish->vote = rand(1,5);
            $dish->description  = 'descrizione prodotto';
            $dish->save();
        }


    }
}
