<?php

namespace Database\Seeders;




use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**

     * Seed the application's database.

     * Run the database seeds.

     *
     * @return void
     */
    public function run()
    {
        $this->call([

            TypesTableSeeder::class,
            DishesTableSeeder::class,
            RestaurantTableSeeder::class,

        ]);
    }
}
