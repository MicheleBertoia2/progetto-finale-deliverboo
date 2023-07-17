<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dish;
use App\Http\Requests\DishRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $dishes = Dish::all();
        return view('admin.dish.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dishes = Dish::all();
        return view('admin.dish.create', compact('dishes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     */
    public function store(DishRequest $request)
    {
        $form_data = $request->all();
        $form_data['slug'] = Dish::generateSlug($form_data['name']);


        $form_data['restaurant_id'] = Auth::id();


        if(array_key_exists('image_path', $form_data)){
            $form_data['image_path'] = Storage::put('uploads',  $form_data['image_path']);
        };


        $new_dish = new Dish();
        $new_dish->fill($form_data);
        $new_dish->save();

        return redirect()->route('admin.dishes.show', $new_dish);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        return view('admin.dish.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        return view('admin.dish.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DishRequest $request, Dish $dish)
    {
        $form_data = $request->all();

        if($form_data['name'] !== $dish->name){
            $form_data['name'] = Dish::generateSlug($form_data['name']);
        }else{
            $form_data['slug'] = $dish->slug;
        }


        if (array_key_exists('image_path', $form_data)) {
            if ($dish->image_path) {
                Storage::disk('public')->delete($dish->image_path);
            }
            $form_data['image_path'] = Storage::put('uploads', $form_data['image_path']);
        }





        $dish->update($form_data);

        return redirect()->route('admin.dishes.show', $dish);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        Storage::disk('public')->delete($dish->image_path);
        $dish->delete();

        return redirect()->route('admin.dishes.index');
    }
}
