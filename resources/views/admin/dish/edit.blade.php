@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="py-4">Modifica piatto: {{ $dish->name }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.dishes.update', $dish) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nome Piatto</label>
                <input id="name" class="form-control @error('name') is-invalid @enderror" name="name" type="text"
                    placeholder="Nome Piatto" value="{{ old('name',$dish->name) }}">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione Prodotto</label>
                <input id="description" class="form-control @error('description') is-invalid @enderror "
                    name=" 	description" type="text" placeholder="Descrizione Prodotto"
                    value="{{ old('description',$dish->description) }}">
                @error('description')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                <input id="price" class="form-control @error('price') is-invalid @enderror" name="price"
                    type="number" placeholder="inserisci il prezzo utilizzando il punto al posto della virgola"
                    value="{{ old('price',$dish->price) }}">
                @error('price')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="ingredients" class="form-label">Ingredienti</label>
                <input id="ingredients" class="form-control @error('ingredients') is-invalid @enderror" name="ingredients"
                    type="text" placeholder="Ingredienti"
                    value="{{ old('ingredients',$dish->ingredients) }}">
                @error('ingredients')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="vote" class="form-label">Voto prodotto</label>
                <input id="vote" class="form-control @error('vote') is-invalid @enderror" name="vote" type="number"
                    placeholder="inserisci un numero da 1 a 5"
                    value="{{ old('vote',$dish->vote) }}">
                @error('vote')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image_path" class="form-label">Immagine</label>
                <input onchange="" type="text" value="{{ old('image_path', $dish?->image_path) }}" class="form-control @error('image_path') is-invalid @enderror" id="text_input" name="image_path">
                <input onchange="showImagePreview(event), handleFileSelection(event)" type="file" value="{{ old('image_path', $dish?->image_path) }}" class="form-control @error('image_path') is-invalid @enderror" id="file_input" name="">
                @if(str_contains($dish->image_path, 'http://') || str_contains($dish->image_path, 'https://'))
                <img height="300px" class="mt-3 bg-white" id="prev-img" src="{{ $dish->image_path ? $dish->image_path : Vite::asset('resources\img\placeholder-img.png') }}" alt="">
                @else
                <img height="300px" class="mt-3 bg-white" id="prev-img" src="{{ $dish->image_path ? asset('storage/' . $dish->image_path) : Vite::asset('resources\img\placeholder-img.png') }}" alt="">
                @endif
                @error('image_path')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <button class="btn btn-success" type="submit">Modifica Piatto</button>

        </form>

    </div>

    <script>
        function showImagePreview(event){
            const tagImage = document.getElementById('prev-img');
            tagImage.src = URL.createObjectURL(event.target.files[0]);
        }

        function handleFileSelection(event) {
            // Imposta il valore dell'input di tipo "text" su uno spazio vuoto ("")
            document.getElementById("text_input").value = "";             //sotituire dove c'è scritto oppure
            // Imposta il valore dell'attributo name dell'input in base alla condizione
            document.getElementById("file_input").name = (event.target.value == "") ? '' : 'image_path';
            document.getElementById("text_input").name = '';             //sotituire dove c'è scritto oppure
            //* oppure
            document.getElementById("text_input").classList.add("d-none");
        }

    </script>
@endsection
