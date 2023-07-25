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
        $user = Auth::user();
        $res_id  = $user->restaurant->id;
        $dishes = Dish::where('restaurant_id', $res_id)->get();
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

        $user = Auth::user();
        $res_id = $user->restaurant->id;

        $form_data['restaurant_id'] =  $res_id;

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
        $user = Auth::user();
        $restaurant = $user->restaurant;
        if($dish->restaurant_id == $restaurant->id){

            return view('admin.dish.show', compact('dish'));
        }else{
            return redirect()->route('admin.dishes.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        $user = Auth::user();
        $restaurant = $user->restaurant;
        if($dish->restaurant_id == $restaurant->id){

            return view('admin.dish.edit', compact('dish'));
        }else{
            return redirect()->route('admin.dishes.index');
        }
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

        //* verifica se i name noImage e image_path esistono nel form e se noImage ha come valore 'delete' //* UTILE DOVE LE IMMAGINI SONO NULLABLE (CIOè NON SONO OBBLIGATORIE) ed INUTILE DOVE SONO OBBLIGATORIE
        if((array_key_exists('noImage', $form_data)) && ($form_data['noImage'] == 'delete') && (array_key_exists('image_path', $form_data))){
            Storage::disk('public')->delete($dish->image_path);
            // salva limmagine del placeholder nel database quando viene cliccato elimina immagine //* UTILE DOVE LE IMMAGINI SONO NULLABLE (CIOè NON SONO OBBLIGATORIE) ES. PER I RISTORANTI
            $form_data['image_path'] = "resources/img/placeholder-img.png";
        }
        //* verifica se i name noImage e image_path esistono nel form
        else if((array_key_exists('noImage', $form_data)) && (array_key_exists('image_path', $form_data))){
            //* NEL CASO NON DOVESSE ESSERCI L'IMMAGINE, SUCCESSIVAMENTE COMPARE L'ERRORE CHE NESSUNA IMMAGINE è STATA INSERITA E VIENE CLICCATO DIRETTAMENTE IL BUTTON SUBMIT SENZA INSERIRE UN IMMAGINE, VIENE SEMPLICEMENTE RICARICATO NEL DB LO STESSO VALORE CHE ERA GIà PRESENTE NEL DB
            // $form_data['image_path'] = $dish->image_path;
            // oppure
            $form_data['image_path'] = $oldImagePath;
        }
        // Verifica se l'input di tipo "file" per l'immagine è vuoto
        else if ($request->hasFile('image_path') && !(array_key_exists('noImage', $form_data))) {
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

        // dd($form_data);
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
