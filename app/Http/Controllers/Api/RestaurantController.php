<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Type;
use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;


class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::inRandomOrder()->take(5)->get();
        $types = Type::all();
        $dishes = Dish::all();

        return  response()->json(compact('restaurants', 'types','dishes'));
    }



    public function restaurantTypesSearch()
    {
        $restaurants = Restaurant::with('types')->get();

        return response()->json(compact('restaurants'));
    }

    public function getRestaurantDetail ($slug){
        // $restaurants = Restaurant::where('slug', $slug)->with('types','dishes')->first();

        // if($restaurants->image) $restaurants->image = asset('storage/' . $restaurants->image) ;
        // else{
        //     $restaurants->image = asset('storage/uploads/placeholder-img.png');
        // }

        if((str_contains($restaurants->image, 'http://') || str_contains($restaurants->image, 'https://'))){
            $restaurants->image;
        }else if(str_contains($restaurants->image, "resources/img/placeholder-img.png" )){
            $restaurants->image = "../../img/placeholder-img.png";
        }
        else{
            $restaurants->image = asset('storage/' . $restaurants->image);

        // return response()->json($restaurants);
        /* $restaurant = Restaurant::where('slug', $slug)->with('types', 'dishes')->first();

        if (!$restaurant) {
            return response()->json(['error' => 'Ristorante non trovato'], 404);
        }
      
        if ($restaurant->image) {
            $restaurant->image = asset('storage/' . $restaurant->image);
        } else {
            $restaurant->image = asset('storage/uploads/placeholder-img.png'); */

        }

    return response()->json($restaurant);
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
