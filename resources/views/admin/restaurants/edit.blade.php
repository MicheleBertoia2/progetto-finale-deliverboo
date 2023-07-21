@extends('layouts.admin')

@section('content')


    <div class="container  p-5 " >

        <h1>Modifica Ristorante: {{ $restaurant->name }}
            <form action="{{ route('admin.restaurants.destroy', $restaurant) }}" method="POST" class="d-inline"
                onsubmit="return confirm('Confermi l\'eliminazione del ristorante: {{ $restaurant->name }} ?')">
                @csrf
                {{-- * aggiungere DELETE perchè non è possibile inserire PUT/PATCH nel method del form al posto di POST --}}
                @method('DELETE')
                <button type="submit" class="btn btn-danger mb-2"><i class="fa-solid fa-trash"></i></a>
            </form>
        </h1>

        {{-- {{ $errors }} --}}
        @if ($errors->any())
            <div class="alert alert-danger mt-4" role="alert">
                <ul>
                    {{-- $errors->all() inserisce gli errori in un array che viene ciclato solo se $errors->any() è true --}}
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.restaurants.update', $restaurant) }}" method="POST" enctype="multipart/form-data">
            {{-- //* token IMPORTANTE di verifica validità del form (viene utilizzato per dare una maggiore sicurezza ai dati) --}}
            @csrf
            {{-- * aggiungere PUT perchè non è possibile inserire PUT/PATCH nel method del form al posto di POST --}}
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" required minlength="2" maxlength="255"
                    class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    placeholder="Pizzeria Roma" value="{{ old('name', $restaurant?->name) }}">
            </div>
            @error('name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <div class="mb-3">
                <label for="image" class="form-label">Immagine</label>
                <input onchange="showImagePreview(event)" type="text" class="form-control" id="input-no-path-selected" name="noPathSelected"
                    value="" style="opacity: 0; border: none; height: 0; width: 0;">
                <input onchange="showImagePreview(event), handleFileSelection(event)"  type="file"
                    class="form-control @error('image') is-invalid @enderror" id="file_input" name=""
                    value="{{ old('image', $restaurant?->image) }}">
                {{-- <img height="300px" class="mt-3 bg-white px-5" id="prev-img" src="{{ Vite::asset('resources\img\placeholder-img.png') }}" alt=""> --}}
                {{-- <img class="w-25 mt-3 bg-white {{ $restaurant->image ? '' : 'px-5'}}" id="prev-img" src="{{ $restaurant->image ? asset('storage/' . $restaurant->image) : Vite::asset('resources\img\placeholder-img.png') }}" alt="{{ $restaurant->image == false ? "Nessuna immagine" : $restaurant->name }}"> --}}
                <div class="d-flex align-items-end flex-wrap">
                    <div>
                        @if (str_contains($restaurant->image, 'http://') || str_contains($restaurant->image, 'https://'))
                            <img height="300px" class="mt-3 bg-white" id="prev-img"
                                src="{{ $restaurant->image ? $restaurant->image : Vite::asset('resources\img\placeholder-img.png') }}"
                                alt="{{ $restaurant->image == false ? 'Nessuna immagine' : $restaurant->name }}">
                        @elseif(str_contains($restaurant->image, "resources/img/placeholder-img.png" ))
                            <img height="300px" class="mt-3 bg-white" id="prev-img" src="{{ Vite::asset($restaurant->image) }}" alt="{{ $restaurant->name }}">
                        @else
                            <img height="300px" class="mt-3 bg-white" id="prev-img"
                                src="{{ $restaurant->image ? asset('storage/' . $restaurant->image) : Vite::asset('resources\img\placeholder-img.png') }}"
                                alt="{{ $restaurant->image == false ? 'Nessuna immagine' : $restaurant->name }}">
                        @endif
                    </div>
                    {{-- * il button deve essere type="button" oppure diverrà automaticamnete type="submit" --}}
                    <button type="button" class="btn btn-danger ms-1 " id="deleteButton" onclick="deleteImage()" style="width: 50px; height: 50px;"><span class="fa-solid fa-trash"></span><input id="inputDeleteImage" type="text" value="empty" name="noImage" style="opacity: 0; border: none; height: 0; width: 0;"></button>
                </div>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Indirizzo</label>
                <input type="text" required minlength="2" maxlength="255"
                    class="form-control @error('address') is-invalid @enderror" id="address" name="address"
                    placeholder="Via Roma n. 1" value="{{ old('address', $restaurant?->address) }}">
            </div>
            @error('address')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <div class="mb-3">
                <label for="vat_number" class="form-label">Numero Partita IVA:</label>
                <input type="text" pattern="[0-9]*" required minlength="8" maxlength="11"
                    class="form-control @error('vat_number') is-invalid @enderror" id="vat_number" name="vat_number"
                    placeholder="Inserire massimo 11 numeri es. 12345678901" value="{{ old('vat_number', $restaurant?->vat_number) }}">
            </div>
            @error('vat_number')
                <p class="text-danger">{{ $message }}</p>
            @enderror

        <div class="mb-3">
            <label for="address" class="form-label">Tipologie del ristorante</label>
            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                @foreach ($types as $type)
                    <input type="checkbox" class="btn-check" id="{{ $type->id }}" autocomplete="off" name="types[]"
                        value="{{ $type->id }}" {{ $restaurant && $restaurant->types->contains($type) ? 'checked' : '' }}>
                    <label class="btn btn-outline-dark" for="{{ $type->id }}">{{ $type->name }}</label>
                @endforeach
            </div>
        </div>

            <button type="submit" class="btn mybadge mt-4 d-block">Modifica</button>

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
            // svuoto il valore dell'input nascosto
            const fileInput = document.getElementById('input-no-path-selected');
            fileInput.value = '';

            // Imposta il name dell'attributo nell'input = image
            document.getElementById('file_input').name = 'image';

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

        function deleteImage(){
            // svuoto il valore dell'input nascosto
            const fileInput = document.getElementById('input-no-path-selected');
            fileInput.value = 'empty_input';

            // Imposta il name dell'attributo nell'input = image
            document.getElementById('file_input').name = 'image';

            const tagImage = document.getElementById('prev-img');
            tagImage.src = "{{ Vite::asset('resources/img/placeholder-img.png') }}";
            // svuoto l'input
            document.getElementById('file_input').value = '';

            //imposto un valore che sarà uguale a quello passato al controller //* utile per quando l'immagine non è obbligatoria (cioè nullable) in questo caso l'immagine non è obbligatoria
            document.getElementById("inputDeleteImage").value = "delete";

            // Disabilito il button
            const buttonDelete = document.getElementById("deleteButton");
            buttonDelete.disabled = true;
            buttonDelete.classList.add('d-none');
        }
    </script>

@endsection
