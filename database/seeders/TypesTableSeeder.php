<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;
use App\Models\Type;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $types = ['Italiano', 'Giapponese', 'Cinese', 'Americano'];

        foreach($types as $type){
            $new_type = new Type();
            $new_type->name = $type;
            $new_type->slug = Type::generateSlug($new_type->name);

            //* dump dei dati + php artisan db:seed --class=NamesTableSeeder OPPURE se è centralizzato in DatabaseSeeder.php inviare il comando php artisan db:seed
            // dd($new_type);
            //* invio i dati + php artisan db:seed --class=NamesTableSeeder OPPURE se è centralizzato in DatabaseSeeder.php inviare il comando php artisan db:seed
            $new_type->save();

        }

    }
}
