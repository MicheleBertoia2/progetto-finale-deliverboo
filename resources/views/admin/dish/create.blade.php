@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Crea un nuovo piatto</h1>



        <form action="{{route('admin.dishes.store')}}"
        method="POST" enctype="multipart/form-data">
        @csrf


        <div class="mb-3">
            <label for="name" class="form-label">Nome Piatto</label>
            <input id="name" class="form-control"  name="name"
                type="text" placeholder="Nome Piatto">
        </div>

        <div class="mb-3">
            <label for=" 	description" class="form-label">Descrizione Prodotto</label>
            <input id=" 	description" class="form-control"  name=" 	description"
                type="text" placeholder="Descrizione Prodotto">
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input id="price" class="form-control"  name="price"
            type="text" placeholder="Prezzo">
        </div>

        <div class="mb-3">
            <label for="ingredients" class="form-label">Ingredienti</label>
            <input id="ingredients" class="form-control"  name="ingredients"
            type="text" placeholder="Ingredienti">
        </div>

        <div class="mb-3">
            <label for="vote" class="form-label">Voto prodotto</label>
            <input id="vote" class="form-control"  name="vote"
            type="text" placeholder="Voto prodotto">
        </div>

        <div class="mb-3">
            <label for="image_path" class="form-label">Url Immagine</label>
            <input id="image_path" class="form-control"  name="image_path"
                type="text" placeholder="Url">
        </div>

        <button type="submit" class="btn btn-success">Crea Piatto</button>

        </form>

    </div>

@endsection
