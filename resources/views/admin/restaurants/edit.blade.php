@extends('layouts.admin')

@section('content')


    <div class="container overflow-auto p-5 " >

        <h1>Modifica Ristorante: {{ $restaurant->name }}
            <form action="{{ route('admin.restaurants.destroy', $restaurant) }}" method="POST" class="d-inline"
                onsubmit="return confirm('Confermi l\'eliminazione del ristorante: {{ $restaurant->name }} ?')">
                @csrf
                {{-- * aggiungere DELETE perchè non è possibile inserire PUT/PATCH nel method del form al posto di POST --}}
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
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
                <input onchange="showImagePreview(event), handleFileSelection(event)" type="file"
                    class="form-control @error('image') is-invalid @enderror" id="file_input" name="image"
                    value="{{ old('image', $restaurant?->image) }}">
                {{-- <img height="300px" class="mt-3 bg-white px-5" id="prev-img" src="{{ Vite::asset('resources\img\placeholder-img.png') }}" alt=""> --}}
                {{-- <img class="w-25 mt-3 bg-white {{ $restaurant->image ? '' : 'px-5'}}" id="prev-img" src="{{ $restaurant->image ? asset('storage/' . $restaurant->image) : Vite::asset('resources\img\placeholder-img.png') }}" alt="{{ $restaurant->image == false ? "Nessuna immagine" : $restaurant->name }}"> --}}
                <div class="d-flex align-items-end">
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
                    <button type="button" class="btn btn-danger ms-3 mt-3" id="deleteButton" onclick="deleteImage()" style="width: 180px; height: 70px;"><span class="fa-solid fa-trash"></span> Elimina immagine <input id="inputDeleteImage" type="hidden" value="delete" name="noImage" style="opacity: 0; border: none; height: 0; width: 0;"></button>
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
                    placeholder="Inserire massimo 11 numeri" value="{{ old('vat_number', $restaurant?->vat_number) }}">
            </div>
            @error('vat_number')
                <p class="text-danger">{{ $message }}</p>
            @enderror

            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                @foreach ($types as $type)
                    <input type="checkbox" class="btn-check" id="{{ $type->id }}" autocomplete="off" name="types[]"
                        value="{{ $type->id }}" {{ $restaurant && $restaurant->types->contains($type) ? 'checked' : '' }}>
                    <label class="btn btn-outline-primary" for="{{ $type->id }}">{{ $type->name }}</label>
                @endforeach
            </div>

            <button type="submit" class="btn btn-primary mt-3 d-block">Submit</button>

        </form>

    </div>

    <script>
        // * funzione per mostrare l'anteprima delle immagini
        function showImagePreview(event) {
            const tagImage = document.getElementById('prev-img');
            tagImage.src = URL.createObjectURL(event.target.files[0]);

            // condizione non necessaria solo per rimuovere il padding alle images inserite
            // if(tagImage){
            // tagImage.classList.remove("px-5");
            // }
        }

        function handleFileSelection(event) {
            // Imposta il valore dell'attributo name dell'input in base alla condizione
            // document.getElementById("file_input").name = (event.target.value == "") ? '' : 'image';
            // Imposta il valore dell'input di tipo "text" su uno spazio vuoto ("")
            // document.getElementById("text_input").value = "";                       //sotituire dove c'è scritto oppure
            // Imposta il name dell'input di tipo "text" su uno spazio vuoto ("")
            // document.getElementById("text_input").name = '';                        //sotituire dove c'è scritto oppure
            //* oppure
            // document.getElementById("text_input").classList.add("d-none");

            // document.getElementById('file_input').name = 'image';

            // abilito il button
            const buttonDelete = document.getElementById("deleteButton");
            buttonDelete.disabled = false;
            buttonDelete.classList.remove('disabled');

            // rimuovo il name noImage
            document.getElementById("inputDeleteImage").name = "";
            document.getElementById("inputDeleteImage").value = "";
        }

        function deleteImage(){
            const tagImage = document.getElementById('prev-img');
            tagImage.src = "{{ Vite::asset('resources/img/placeholder-img.png') }}";
            //svuoto entrambi gli input
            // document.getElementById('text_input').name = '';
            // document.getElementById('text_input').value = '';

            // document.getElementById('file_input').name = '';
            document.getElementById('file_input').value = '';
            // document.getElementById('file_input').name = 'image';

            //imposto un valore che sarà uguale a quello passato al controller //* utile per quando l'immagine non è obbligatoria (cioè nullable) in questo caso l'immagine non è obbligatoria
            document.getElementById("inputDeleteImage").value = "delete";
            // document.getElementById("inputDeleteImage").value = "";

            // Disabilito il button
            const buttonDelete = document.getElementById("deleteButton");
            buttonDelete.disabled = true;
            buttonDelete.classList.add('disabled');
        }
    </script>

@endsection
