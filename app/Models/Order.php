<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'total_price', 'customer_name', 'customer_address', 'customer_mail', 'customer_phone', 'restaurant_id'
    ];

    protected $dates = ['deleted_at'];

    public  function  dishes(){
        return $this->belongsToMany(Dish::class)->withPivot('quantity');
    }
}
