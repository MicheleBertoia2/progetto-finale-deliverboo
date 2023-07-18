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
        $dishes = Dish::all()->where('restaurant_id', Auth::id());
        return view('admin.dish.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dish.create');
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

        $oldImagePath = $dish->image_path;

        // Verifica se l'input di tipo "file" per l'immagine è vuoto
        if ($request->hasFile('image_path')) {
                //* edit per l'IMMAGINE (FUNZIONANTE ANCHE SE L'IMMAGINE è STATA PRESA DA UN API)
                //* se è stata caricata un immagine (dal campo di input nel form) e se il value dell'input(/il percorso dell'immagine) non contiene http:// o https:// quindi l'immagine NON è STATA PRESA DALL'API
                if (array_key_exists('image_path', $form_data) && !(str_contains($form_data['image_path'], 'http://') || str_contains($form_data['image_path'], 'https://'))){

                    //* se l'immagine esiste (NEL DB) vuol dire che ne ho caricata una nuova E NON è STATA PRESA DALL'API (NEL DB) e quindi ELIMINO quella precedente
                    if ($dish->image_path && !(str_contains($dish->image_path, 'http://') || str_contains($dish->image_path, 'https://'))) {
                        // se è presente sul disco in public ed elimina l'immagine già presente
                        Storage::disk('public')->delete($dish->image_path);
                    }

                    // l'immagine viene salvata nel db con il percorso(uploads/WQZmcTvnkWAVcb35NKprvhlCQfRE2VXRTpSytd8C.jpg)
                    $form_data['image_path'] = Storage::put('uploads', $form_data['image_path']);
                }
            } else {
                // Mantieni l'immagine precedente
                $dish->image_path = $oldImagePath;
            }

        $dish->update($form_data);

        return redirect()->route('admin.dishes.show', compact('dish', 'oldImagePath'));
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
