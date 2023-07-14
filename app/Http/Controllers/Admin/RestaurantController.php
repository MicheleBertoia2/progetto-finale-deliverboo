<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Restaurant;
use Illuminate\Support\Facades\Storage;
//* Requests per la validazione degli errori
use App\Http\Requests\RestaurantRequest;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //* vengono mostrati tutti progetti in una volta
        // $restaurants = Restaurant::all();
        //* vengono mostrati 10 progetti alla volta (per far ciò è necessario importare bootstrap in AppServiceProvider)
        $restaurants = Restaurant::paginate(10);

        return view('admin.restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.restaurants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RestaurantRequest $request)
    {
        //* per creare un nuovo progetto e salvare i dati nel database al click del button submit del form in create
        $form_data = $request->all();

        $new_restaurant = new Restaurant();

        //* IMMAGINI
        if (array_key_exists('image', $form_data)) {

            //* CARICARE UN IMMAGINE mantendo lo stesso nome
            // prima di salvare l'immagine salvo il nome
            $form_data['image_original_name'] = $request->file('image')->getClientOriginalName();
            // salvo l'immagine nella cartella uploads (public\storage\uploads) e in $form_data['image_path'] salvo il percorso //! il nome originale viene salvato nel db ma nel percorso del db e nella cartella uploads non viene salvato il nome originale
            $form_data['image_path'] = Storage::put('uploads', $form_data['image']);
        }

        //*soluzione con fillable (collegata al model Restaurant.php)
        // lo slug deve essere generato in modo automatico ogni volta che viene creato un nuovo prodotto quindi è stata creata un funzione nel model
        $form_data['slug'] = Restaurant::generateSlug($form_data['name']);
        // con fill i dati vengono salvati tramite le chiavi salvate nel model in protected $fillable in modo da fare l'associazione chiave-valore automaticamente
        $new_restaurant->fill($form_data);

        // dd($request->all());
        $new_restaurant->save();

        //* redirect al progetto appena generato
        return redirect()->route('admin.restaurants.show', $new_restaurant);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {


        return view('admin.restaurants.show', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        return view('admin.restaurants.edit', compact('restaurant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RestaurantRequest $request, Restaurant $restaurant)
    {
        //* prendo tutti i dati fillable salvati in request
        $form_data = $request->all();

        //* se il titolo è stato modificato
        //* genero un nuovo slug
        //* altrimenti lo slug resta lo stesso di prima
        if ($restaurant->slug === $form_data['name']) {
            $form_data['slug'] = Restaurant::generateSlug($form_data['name']);
        } else {
            $form_data['slug'] = $restaurant->slug;
        }

        //* edit per l'IMMAGINE
        // verificare se è stata caricata un immagine (dal campo di input nel form)
        if (array_key_exists('image', $form_data)) {

            //* se l'immagine esiste (NEL DB) vuol dire che ne ho caricata una nuova e quindi ELIMINO quella precedente
            if ($restaurant->image_path) {
                // se è presente sul disco in public ed elimina l'immagine già presente
                Storage::disk('public')->delete($restaurant->image_path);
            }

            //* (MIGLIORE) soluzione PER CARICARE UN IMMAGINE mantendo lo stesso nome
            // prima di salvare l'immagine salvo il nome
            $form_data['image_original_name'] = $request->file('image')->getClientOriginalName();
            // salvo l'immagine nella cartella uploads (public\storage\uploads) e in $form_data['image_path'] salvo il percorso //! il nome originale viene salvato nel db ma nel percorso del db e nella cartella uploads non viene salvato il nome originale
            $form_data['image_path'] = Storage::put('uploads', $form_data['image']);
        }

        //* aggiorno i dati
        $restaurant->update($form_data);

        return redirect()->route('admin.restaurants.show', compact('restaurant'));
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
