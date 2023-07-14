<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Dish extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','slug','image_path','price','ingredients','vote','description','restaurant_id',
    ];

    public static function generateSlug($str){

        $slug = Str::slug($str, '-');
        $original_slug = $slug;



        $slug_exixts = Dish::where('slug', $slug)->first();
        $c = 1;
        while($slug_exixts){
            $slug = $original_slug . '-' . $c;
            $slug_exixts = Dish::where('slug', $slug)->first();
            $c++;
        }

        return $slug;
    }

    //creo le relazioni con  le  altre  tabelle
    public function restaurant(){
        return $this->belongsTo(Restaurant::class);
    }

    public function orders(){
        return $this->belongsToMany(Order::class);
    }
}
