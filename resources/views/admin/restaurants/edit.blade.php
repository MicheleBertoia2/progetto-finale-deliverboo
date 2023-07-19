@extends('layouts.admin')

@section('content')


    <div class="container overflow-auto p-5 " style="max-height: calc(100vh - 70.24px);">

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

            <div class="mb-3" style="width: 73vw; max-width: 73vw;">
                <label for="name" class="form-label">Nome</label>
                <input type="text" required minlength="2" maxlength="255"
                    class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    placeholder="Pizzeria Roma" value="{{ old('name', $restaurant?->name) }}">
            </div>
            @error('name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <div class="mb-3" style="width: 150vh; max-width: 73vw;">
                <label for="image" class="form-label">Immagine</label>
                <input onchange="showImagePreview(event)" type="file"
                    class="form-control @error('image') is-invalid @enderror" id="image" name="image"
                    value="{{ old('image', $restaurant?->image) }}">
                {{-- <img height="300px" class="mt-3 bg-white px-5" id="prev-img" src="{{ Vite::asset('resources\img\placeholder-img.png') }}" alt=""> --}}
                {{-- <img class="w-25 mt-3 bg-white {{ $restaurant->image ? '' : 'px-5'}}" id="prev-img" src="{{ $restaurant->image ? asset('storage/' . $restaurant->image) : Vite::asset('resources\img\placeholder-img.png') }}" alt="{{ $restaurant->image == false ? "Nessuna immagine" : $restaurant->name }}"> --}}
                @if (str_contains($restaurant->image, 'http://') || str_contains($restaurant->image, 'https://'))
                    <img height="300px" class="mt-3 bg-white" id="prev-img"
                        src="{{ $restaurant->image ? $restaurant->image : Vite::asset('resources\img\placeholder-img.png') }}"
                        alt="{{ $restaurant->image == false ? 'Nessuna immagine' : $restaurant->name }}">
                @else
                    <img height="300px" class="mt-3 bg-white" id="prev-img"
                        src="{{ $restaurant->image ? asset('storage/' . $restaurant->image) : Vite::asset('resources\img\placeholder-img.png') }}"
                        alt="{{ $restaurant->image == false ? 'Nessuna immagine' : $restaurant->name }}">
                @endif
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
                    placeholder="12345678901" value="{{ old('vat_number', $restaurant?->vat_number) }}">
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
        // {{-- * funzione per mostrare l'anteprima delle immagini
        function showImagePreview(event) {
            const tagImage = document.getElementById('prev-img');
            tagImage.src = URL.createObjectURL(event.target.files[0]);

            // condizione non necessaria solo per rimuovere il padding alle images inserite
            // if(tagImage){
            // tagImage.classList.remove("px-5");
            // }

        }
    </script>

@endsection
