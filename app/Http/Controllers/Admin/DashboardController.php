<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Dish;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $user = Auth::user();
        $has_restaurant = $user->restaurant?->exists;
        //dd($has_restaurant);
        //$n_dish = Dish::where('restaurant_id', Auth::id())->count();
        if(!$has_restaurant){

            return view('admin.home');
        }
        else{
            return redirect()->route('admin.restaurants.show', $user->restaurant);
        }
    }

}
