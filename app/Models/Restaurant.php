<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Restaurant extends Model
{
    use HasFactory;


    public static function generateSlug($str){

        $slug = Str::slug($str, '-');
        $original_slug = $slug;

        // Controllo di univicità
        /*
            1. controllo se lo slug è presente
            2. se non è presente ritorno slo slug generato
            3. se è presente aggiungo un contatore
            4. se ancho col contatore è presente aggiungo +1 al contatore fino a trovare uno slug univoco
        */

        $slug_exixts = Restaurant::where('slug', $slug)->first();
        $c = 1;
        while($slug_exixts){
            $slug = $original_slug . '-' . $c;
            $slug_exixts = Restaurant::where('slug', $slug)->first();
            $c++;
        }

        return $slug;
    }
}
