<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\RestaurantRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Restaurant;
use App\Models\Type;


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
        $types = Type::all();

        return view('admin.restaurants.create', compact('types'));
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
        $form_data['user_id'] = Auth::id();

        if ($request->hasFile('image') && (array_key_exists('image', $form_data))) {
            $form_data['image'] = Storage::put('uploads', $form_data['image']);
        }
        //* edit per l'IMMAGINE
        //* verifica se i name noImage esiste e image non esiste nel form e se noImage ha come valore 'delete' //* UTILE DOVE LE IMMAGINI SONO NULLABLE (CIOè NON SONO OBBLIGATORIE) ed INUTILE DOVE SONO OBBLIGATORIE
        else if((array_key_exists('noImage', $form_data)) && ($form_data['noImage'] == 'delete') && !(array_key_exists('image', $form_data))
        //* se clicco sull'input file e carico un'immagine nell'input e successivamente clicco sull'input file e non carico un'immagine nell'input ma clicco "annulla" così viene caricata l'img placeholder
            || (array_key_exists('noPathSelected', $form_data)) && ($form_data['noPathSelected'] == 'empty_input')){
                // salva l'immagine del placeholder nel database quando viene cliccato elimina immagine //* UTILE DOVE LE IMMAGINI SONO NULLABLE (CIOè NON SONO OBBLIGATORIE) ES. PER I RISTORANTI
                $form_data['image'] = "resources/img/placeholder-img.png";
            }
        //* verifica se i name noImage esiste e se è uguale a empty (quindi se esiste il valore impostato come default)
        else if((array_key_exists('noImage', $form_data)) && ($form_data['noImage'] == 'empty'))
        {
            $form_data['image'] = "resources/img/placeholder-img.png";
        }
        else {
            $form_data['image'] = "resources/img/placeholder-img.png";
        }

        $new_restaurant = new Restaurant();

        //*soluzione con fillable (collegata al model Restaurant.php)
        // lo slug deve essere generato in modo automatico ogni volta che viene creato un nuovo prodotto quindi è stata creata un funzione nel model
        $form_data['slug'] = Restaurant::generateSlug($form_data['name']);
        // con fill i dati vengono salvati tramite le chiavi salvate nel model in protected $fillable in modo da fare l'associazione chiave-valore automaticamente
        $new_restaurant->fill($form_data);

        // dd($request->all());
        $new_restaurant->save();

        if(array_key_exists('types', $form_data)){
            $new_restaurant->types()->attach($form_data['types']);
        }

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
        $user = Auth::user();
        $restaurant = $user->restaurant;
        // if(!$restaurant->id === $exact_restaurant_id){
        //     $restaurant->id = $exact_restaurant_id;
        // }
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
        $user = Auth::user();
        $restaurant = $user->restaurant;
        $types = Type::all();

        return view('admin.restaurants.edit', compact('restaurant','types'));
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
        if ($form_data['name'] !== $restaurant->name) {
            $form_data['slug'] = Restaurant::generateSlug($form_data['name']);
        } else {
            $form_data['slug'] = $restaurant->slug;
        }

        //* edit per l'IMMAGINE
        $oldImagePath = $restaurant->image;


    //* verifica se i name noImage esiste e image non esiste nel form e se noImage ha come valore 'delete' //* UTILE DOVE LE IMMAGINI SONO NULLABLE (CIOè NON SONO OBBLIGATORIE) ed INUTILE DOVE SONO OBBLIGATORIE
        if((array_key_exists('noImage', $form_data)) && ($form_data['noImage'] == 'delete') && !(array_key_exists('image', $form_data))
    //* se clicco sull'input file e carico un'immagine nell'input e successivamente clicco sull'input file e non carico un'immagine nell'input ma clicco "annulla" così viene caricata l'img placeholder
        || (array_key_exists('noPathSelected', $form_data)) && ($form_data['noPathSelected'] == 'empty_input')){
            Storage::disk('public')->delete($restaurant->image);
            // salva l'immagine del placeholder nel database quando viene cliccato elimina immagine //* UTILE DOVE LE IMMAGINI SONO NULLABLE (CIOè NON SONO OBBLIGATORIE) ES. PER I RISTORANTI
            $form_data['image'] = "resources/img/placeholder-img.png";
        }
        //* verifica se i name noImage esiste e se è uguale a empty (quindi se esiste il valore impostato come default)
        else if((array_key_exists('noImage', $form_data)) && ($form_data['noImage'] == 'empty'))
        {
            // Mantieni l'immagine precedente
            $restaurant->image = $oldImagePath;
        }
        else if ($request->hasFile('image') && (array_key_exists('image', $form_data))) {

            if (array_key_exists('image', $form_data) && !(array_key_exists('noImage', $form_data))) {

                //* se l'immagine esiste (NEL DB) vuol dire che ne ho caricata una nuova e quindi ELIMINO quella precedente
                if ($restaurant->image) {
                    // se è presente sul disco in public ed elimina l'immagine già presente
                    Storage::disk('public')->delete($restaurant->image);
                }

                $form_data['image'] = Storage::put('uploads', $form_data['image']);
            }
        }
        else {
            // Mantieni l'immagine precedente
            $restaurant->image = $oldImagePath;
        }

        // dd($form_data);
        //* aggiorno i dati
        $restaurant->update($form_data);

        if(array_key_exists('types', $form_data)){
            $restaurant->types()->sync($form_data['types']);
        }else{
            $restaurant->types()->detach();
        }

        return redirect()->route('admin.restaurants.show', compact('restaurant', 'oldImagePath'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $user = Auth::user();
        $restaurant = $user->restaurant;
        $restaurant->delete();

        return redirect()->route('admin.home')->with('deleted', "Il ristorante: $restaurant->name è stato eliminato con successo");
    }
}
