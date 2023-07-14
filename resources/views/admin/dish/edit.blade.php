@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="py-4">Crea un nuovo piatto</h1>

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

            <div class="mb-3" style="width: 150vh; max-width: 73vw;">
                <label for="image_path" class="form-label">Immagine</label>
                <input onchange="showImagePreview(event)" type="file" value="{{ old('image_path',$dish->image_path) }}" class="form-control @error('image_path') is-invalid @enderror" id="image_path" name="image_path">
                <img height="300px" class="mt-3 bg-white px-5" id="prev-img" src="{{ Vite::asset('resources\img\placeholder-img.png') }}" alt="">
                @error('image_path')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Crea Piatto</button>

        </form>

    </div>

    <script>
        function showImagePreview(event){
            const tagImage = document.getElementById('prev-img');
            tagImage.src = URL.createObjectURL(event.target.files[0]);

            if(tagImage){
            tagImage.classList.remove("px-5");
            }
        }
    </script>
@endsection
