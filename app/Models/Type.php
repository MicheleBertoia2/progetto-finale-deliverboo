<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    //* funzione per generare uno slug univoco
    public static function generateSlug($str){

        $slug = Str::slug($str, '-');
        $original_slug = $slug;

        $slug_exists = Type::where('slug', $slug)->first();
        $c = 1;

        while($slug_exists){
        $slug = $original_slug . '-' . $c;
        $slug_exists = Type::where('slug', $slug)->first();
        $c++;
        }

        return $slug;
    }

    public function restaurants(){
        return $this->belongsToMany(Restaurant::class);
    }
}
