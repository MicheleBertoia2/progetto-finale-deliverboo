@extends('layouts.admin')

@section('content')
    <div class="container p-5">
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

        <form id="myform" action="{{ route('admin.dishes.update', $dish) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nome Piatto*</label>
                <input required id="name" minlength="2" maxlength="255"
                    class="form-control @error('name') is-invalid @enderror" name="name" type="text"
                    placeholder="Esempio: Pizza Margherita" value="{{ old('name', $dish->name) }}">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione Piatto</label>

                <textarea id="description" rows="4" class="form-control m-0 @error('description') is-invalid @enderror "
                    name="description" type="text"  >{!! old('description', $dish->description) !!}</textarea>
                @error('description')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Prezzo*</label>
                <input id="price" pattern="[0-9.]*" minlength="1" required class="form-control @error('price') is-invalid @enderror" name="price"
                    type="text" placeholder="Esempio: 5.00"
                    value="{{ old('price', $dish->price) }}">
                @error('price')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="ingredients" class="form-label">Ingredienti*</label>
                <input id="ingredients" required class="form-control @error('ingredients') is-invalid @enderror"
                    name="ingredients" type="text" placeholder="Esempio: Mozzarella, pomodoro"
                    value="{{ old('ingredients', $dish->ingredients) }}">
                @error('ingredients')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image_path" class="form-label">Immagine*</label>

                <input onchange="showImagePreview(event)" type="text" class="" id="input-no-path-selected" name="noPathSelected"
                value="" style="opacity: 0; border: none; height: 0; width: 0;">

                <input type="text" value="{{ old('image_path', $dish?->image_path) }}"
                    class="form-control @error('image_path') is-invalid @enderror" id="text_input" name="image_path"
                    style="opacity: 0; border: none; height: 0; width: 0;">

                <input onchange="showImagePreview(event), handleFileSelection(event)" type="file"
                    value="{{ old('image_path', $dish?->image_path) }}"
                    class="form-control @error('image_path') is-invalid @enderror" id="file_input" name="">
                <div class="d-flex align-items-end">
                    <div>
                        @if (str_contains($dish->image_path, 'http://') || str_contains($dish->image_path, 'https://'))
                            <img height="300px" class="mt-3 bg-white" id="prev-img"
                                src="{{ $dish->image_path ? $dish->image_path : Vite::asset('resources\img\placeholder-img.png') }}"
                                alt="{{ $dish->name }}">
                        @elseif(str_contains($dish->image_path, 'resources/img/placeholder-img.png'))
                            <img height="300px" class="mt-3 bg-white" id="prev-img"
                                src="{{ Vite::asset($dish->image_path) }}" alt="{{ $dish->name }}">
                        @else
                            <img height="300px" class="mt-3 bg-white" id="prev-img"
                                src="{{ $dish->image_path ? asset('storage/' . $dish->image_path) : Vite::asset('resources\img\placeholder-img.png') }}"
                                alt="{{ $dish->name }}">
                        @endif
                    </div>
                    {{-- con l'input ratio è funzionante per eliminazione dell'immagine ma non è bello graficamente --}}
                    {{-- <div class="fa-solid fa-trash btn btn-danger mt-3">
                        <input type="radio" name="noImage" class="" onchange="deleteImage()">
                        <label for="">Elimina immagine</label>
                    </div> --}}
                    {{-- * il button deve essere type="button" oppure diverrà automaticamnete type="submit" --}}
                    <button type="button" class="btn btn-danger ms-3 mt-3" id="deleteButton" onclick="deleteImage()"
                        style="width: 50px; height: 50px;"><span class="fa-solid fa-trash"></span><input
                            id="inputDeleteImage" type="hidden" name="noImage"
                            style="opacity: 0; border: none; height: 0; width: 0;"></button>
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

            <button type="submit" class="btn mybadge">Modifica Piatto</button>

        </form>

    </div>

    <script>
        // * funzione per mostrare l'anteprima delle immagini
        // funzione per far sì che il placeholder venga mostrato quando viene inserita un immagine nell'input file e poi cliccando sull'input file non viene inserito nessun percorso e viene cliccato il pulsante "annulla"
        function showImagePreview(event) {
            const imageInput = event.target;
            const previewImage = document.getElementById('prev-img');
            const fileInput = document.getElementById('input-no-path-selected');

            if (imageInput.files && imageInput.files[0]) {
                // Se è stato selezionato un file, mostra l'immagine selezionata
                const reader = new FileReader();

                reader.onload = function (e) {
                previewImage.src = e.target.result;
                };

                reader.readAsDataURL(imageInput.files[0]);
                // abilito il button
                const buttonDelete = document.getElementById("deleteButton");
                buttonDelete.disabled = false;
                buttonDelete.classList.remove('d-none');
            } else {
            //* se clicco sull'input file e carico un'immagine nell'input e successivamente clicco sull'input file e non carico un'immagine nell'input ma clicco "annulla" così viene caricata l'img placeholder
                //imposto un valore che sarà uguale a quello passato al controller //* utile per quando l'immagine non è obbligatoria (cioè nullable) in questo caso l'immagine non è obbligatoria
                // Imposta il value dell'attributo nell'input = 'empty_input'
                fileInput.value = 'empty_input';
                // Se non è stato selezionato un file, mostra l'immagine di placeholder
                previewImage.src = "{{ Vite::asset('resources/img/placeholder-img.png') }}";
                // Disabilito il button
                const buttonDelete = document.getElementById("deleteButton");
                buttonDelete.disabled = true;
                buttonDelete.classList.add('d-none');
            }
        }

        function handleFileSelection(event) {
            // Imposta il valore dell'attributo name dell'input in base alla condizione
            document.getElementById("file_input").name = (event.target.value == "") ? '' : 'image_path';
            // Imposta il valore dell'input di tipo "text" su uno spazio vuoto ("")
            document.getElementById("text_input").value = ""; //sotituire dove c'è scritto oppure
            // Imposta il name dell'input di tipo "text" su uno spazio vuoto ("")
            document.getElementById("text_input").name = ''; //sotituire dove c'è scritto oppure
            //* oppure
            // document.getElementById("text_input").classList.add("d-none");

            if(!fileInput.value == 'empty_input'){
                // abilito il button
                const buttonDelete = document.getElementById("deleteButton");
                buttonDelete.disabled = false;
                buttonDelete.classList.remove('d-none');
            }

            // rimuovo il name noImage
            document.getElementById("inputDeleteImage").name = "";
            document.getElementById("inputDeleteImage").value = "";
        }

        function deleteImage() {

            const tagImage = document.getElementById('prev-img');
            tagImage.src = "{{ Vite::asset('resources/img/placeholder-img.png') }}";
            //svuoto entrambi gli input
            document.getElementById('text_input').name = '';
            document.getElementById('text_input').value = '';

            document.getElementById('file_input').name = 'image_path';
            document.getElementById('file_input').value = '';

            // aggiungo il name noImage
            // document.getElementById("inputDeleteImage").name = "noImage";
            // document.getElementById("inputDeleteImage").value = "resources/img/placeholder-img.png";

            //imposto un valore che sarà uguale a quello passato al controller //* utile per quando l'immagine non è obbligatoria (cioè nullable) in questo caso l'immagune è obbligatoria
            document.getElementById("inputDeleteImage").value = "delete";

            // Disabilito il button
            const buttonDelete = document.getElementById("deleteButton");
            buttonDelete.disabled = true;
            buttonDelete.classList.add('d-none');
        }


    </script>
@endsection
