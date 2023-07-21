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

    public function getByType($slug){
        $types = Type::all();
        //ciclo tutti  i tipi di ristorante e creo  un array  con gli slug
        $enum = [];
        foreach ($types as $type) {
            $enum[] = $type->slug;
        }

        //controllo se lo slug in arrivo è compreso  nell'array di slug

        if (!array_search($slug, $enum)) {
            return redirect()->route('home');
        }

        $restaurants = Restaurant::with('types')
                    ->whereHas('types', function(Builder $query) use($slug){
                        $query->where('slug',$slug);
                    })->get();

        return  response()->json(compact('restaurants'));

    }
    public function getRestaurantDetail ($slug){
        $restaurants = Restaurant::where('slug', $slug)->with('types','dishes')->first();

        if($restaurants->image) $restaurants->image = asset('storage/' . $restaurants->image) ;
        else{
            $restaurants->image = asset('storage/uploads/placeholder-img.png');
        }

        return response()->json($restaurants);
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
