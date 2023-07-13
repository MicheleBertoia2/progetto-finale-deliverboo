@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Crea un nuovo piatto</h1>

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.dishes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf


            <div class="mb-3">
                <label for="name" class="form-label">Nome Piatto</label>
                <input id="name" class="form-control @error('name') is-invalid @enderror" name="name" type="text"
                    placeholder="Nome Piatto">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione Prodotto</label>
                <input id="description" class="form-control @error('description') is-invalid @enderror "
                    name=" 	description" type="text" placeholder="Descrizione Prodotto">
                @error('description')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                <input id="price" class="form-control @error('price') is-invalid @enderror" name="price"
                    type="text" placeholder="inserisci il prezzo tilizzando il punto al posto della virgola">
                @error('price')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="ingredients" class="form-label">Ingredienti</label>
                <input id="ingredients" class="form-control @error('ingredients') is-invalid @enderror" name="ingredients"
                    type="text" placeholder="Ingredienti">
                @error('ingredients')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="vote" class="form-label">Voto prodotto</label>
                <input id="vote" class="form-control @error('vote') is-invalid @enderror" name="vote" type="number"
                    placeholder="inserisci un numero da 1 a 5">
                @error('vote')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image_path" class="form-label">Url Immagine</label>
                <input id="image_path" class="form-control @error('image_path') is-invalid @enderror" name="image_path"
                    type="text" placeholder="Url">
                @error('image_path')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Crea Piatto</button>

        </form>

    </div>

@endsection
