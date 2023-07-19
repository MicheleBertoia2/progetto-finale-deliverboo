<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Restaurant extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    //* array utilizzato per centralizzare i campi della tabella in modo da rendere più leggibile store() in PageController.php (per creare un nuovo progetto)
    protected $fillable = [
        'name',
        'user_id',
        'slug',
        'image',
        'address',
        'vat_number',
    ];



    public static function generateSlug($str)
{
    $slug = Str::slug($str, '-');
    $original_slug = $slug;

    $slug_exists = Restaurant::withTrashed()->where('slug', $slug)->first();
    $c = 1;

    while ($slug_exists) {
        $slug = $original_slug . '-' . $c;
        $slug_exists = Restaurant::withTrashed()->where('slug', $slug)->first();
        $c++;
    }

    return $slug;
}


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function dishes(){
        return $this->hasMany(Dish::class);
    }

    public function orders(){
        return $this->hasMany(Dish::class);
    }

    public function types(){
        return $this->belongsToMany(Type::class);
    }
}
