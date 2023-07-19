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
                <textarea id="description"  rows="4" class="form-control @error('description') is-invalid @enderror "
                    name="description" value="{{ old('description') }}" type="text" placeholder="Descrizione piatto"></textarea>
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

{{-- * da eliminare --}}
            {{-- <div class="mb-3">
                <label for="vote" class="form-label">Voto prodotto</label>
                <input id="vote" class="form-control @error('vote') is-invalid @enderror" name="vote" value="{{ old('vote', $dish->vote) }}" type="number"
                    placeholder="inserisci un numero da 1 a 5">
                @error('vote')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div> --}}

            <div class="mb-3">
                <label for="image_path" class="form-label">Immagine</label>
                <input type="text" value="{{ old('image_path', $dish?->image_path) }}" class="form-control" id="text_input" name="image_path" style="opacity: 0; border: none; height: 0; width: 0;">
                <input onchange="showImagePreview(event), handleFileSelection(event)" type="file" value="{{ old('image_path', $dish?->image_path) }}" class="form-control @error('image_path') is-invalid @enderror" id="file_input" name="">
                <div class="d-flex align-items-end">
                    <div>
                        @if(str_contains($dish->image_path, 'http://') || str_contains($dish->image_path, 'https://'))
                        <img height="300px" class="mt-3 bg-white" id="prev-img" src="{{ $dish->image_path ? $dish->image_path : Vite::asset('resources\img\placeholder-img.png') }}" alt="{{ $dish->name }}">
                        @elseif(str_contains($dish->image_path, "resources/img/placeholder-img.png" ))
                        <img height="300px" class="mt-3 bg-white" id="prev-img" src="{{ Vite::asset($dish->image_path) }}" alt="{{ $dish->name }}">
                        @else
                        <img height="300px" class="mt-3 bg-white" id="prev-img" src="{{ $dish->image_path ? asset('storage/' . $dish->image_path) : Vite::asset('resources\img\placeholder-img.png') }}" alt="{{ $dish->name }}">
                        @endif
                    </div>
                    {{-- <div class="fa-solid fa-trash btn btn-danger mt-3">
                        <input type="radio" name="noImage" class="" onchange="deleteImage()">
                        <label for="">Elimina immagine</label>
                    </div> --}}
                    {{-- * il button deve essere type="button" oppure diverrà automaticamnete type="submit" --}}
                    <button type="button" class="btn btn-danger ms-3 mt-3" id="deleteButton" onclick="deleteImage()" style="width: 180px; height: 70px;"><span class="fa-solid fa-trash"></span> Elimina immagine <input id="inputDeleteImage" type="hidden" name="noImage" style="opacity: 0; border: none; height: 0; width: 0;"></button>
                </div>
                @error('image_path')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="is_visible" class="form-label">Seleziona Visibilità</label>
                <select class="form-select" name="is_visible">
                    <option selected value="1">Visibile</option>
                    <option value="0">Non Visibile</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Modifica Piatto</button>

        </form>

    </div>

    <script>
        function showImagePreview(event){
            const tagImage = document.getElementById('prev-img');
            tagImage.src = URL.createObjectURL(event.target.files[0]);
        }

        function handleFileSelection(event) {
            // Imposta il valore dell'attributo name dell'input in base alla condizione
            document.getElementById("file_input").name = (event.target.value == "") ? '' : 'image_path';
            // Imposta il valore dell'input di tipo "text" su uno spazio vuoto ("")
            document.getElementById("text_input").value = "";                       //sotituire dove c'è scritto oppure
            // Imposta il name dell'input di tipo "text" su uno spazio vuoto ("")
            document.getElementById("text_input").name = '';                        //sotituire dove c'è scritto oppure
            //* oppure
            // document.getElementById("text_input").classList.add("d-none");

            // abilito il button
            const buttonDelete = document.getElementById("deleteButton");
            buttonDelete.disabled = false;
            buttonDelete.classList.remove('disabled');

            // rimuovo il name noImage
            document.getElementById("inputDeleteImage").name = "";
            document.getElementById("inputDeleteImage").value = "";
        }

        function nameInput(){
            // rimuovo il name noImage
            document.getElementById("inputDeleteImage").name = "noImage";
            document.getElementById("inputDeleteImage").value = "resources/img/placeholder-img.png";
            // document.getElementById('file_input').value = "";
            // document.getElementById('file_input').name = "";
            // document.getElementById('file_input').value = "resources/img/placeholder-img.png";
            // document.getElementById('file_input').name = "image_path";
            // document.getElementById('file_input').value = "{{ Vite::asset('resources/img/placeholder-img.png') }}";
            // document.getElementById('file_input').name = "image_path";
        }

        function deleteImage(){

            // imageInput.value = "";
            const tagImage = document.getElementById('prev-img');
            tagImage.src = "{{ Vite::asset('resources/img/placeholder-img.png') }}";
            // const imageInput = document.getElementById('file_input');
            // l'input con id = file_input viene assegnato il name noImage
            // imageInput.name = 'noImage';
            // imageInput.value = "resources/img/placeholder-img.png";
            // imageInput.name = '';

            document.getElementById('file_input').value = "{{ Vite::asset('resources/img/placeholder-img.png') }}";
            document.getElementById('file_input').name = "image_path";
            // document.getElementById('file_input').value = "resources/img/placeholder-img.png";

            // document.getElementById('file_input').value = "resources/img/placeholder-img.png";
            // document.getElementById('file_input').name = "image_path";

            // todo sistemare le condizioni occhio ai !
// * sistemare le condizioni occhio ai !
            // imageInput.name += 'test';

            // rimuovo il name noImage
            document.getElementById("inputDeleteImage").name = "noImage";
            document.getElementById("inputDeleteImage").value = "resources/img/placeholder-img.png";

            // // Imposta il valore dell'input di tipo "text" su uno spazio vuoto ("")
            document.getElementById("text_input").value = "";                       //sotituire dove c'è scritto oppure
            // // Imposta il name dell'input di tipo "text" su uno spazio vuoto ("")
            // document.getElementById("text_input").name = 'noImage';
            document.getElementById("text_input").name = '';

            // Disabilito il button
            const buttonDelete = document.getElementById("deleteButton");
            buttonDelete.disabled = true;
            buttonDelete.classList.add('disabled');
        }


    </script>
@endsection
