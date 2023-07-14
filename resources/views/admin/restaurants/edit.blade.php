@extends('layouts.admin')

@section('content')


<div class="container overflow-auto p-5 d-flex flex-column align-items-center" style="max-height: calc(100vh - 70.24px);">

    <h1>Modifica Ristorante: {{ $restaurant->name }}</h1>

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
        {{--* aggiungere PUT perchè non è possibile inserire PUT/PATCH nel method del form al posto di POST --}}
        @method('PUT')

        <div class="mb-3" style="width: 73vw; max-width: 73vw;">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Pizzeria Roma" value="{{ old('name', $restaurant?->name)}}">
        </div>
        @error('name')
        <p class="text-danger">{{ $message }}</p>
        @enderror
        <div class="mb-3" style="width: 150vh; max-width: 73vw;">
            <label for="image" class="form-label">Immagine</label>
            <input onchange="showImagePreview(event)" type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image', $restaurant?->image_original_name) }}">
            {{-- <img height="300px" class="mt-3 bg-white px-5" id="prev-img" src="{{ Vite::asset('resources\img\placeholder-img.png') }}" alt=""> --}}
            <img class="w-25 mt-3 bg-white px-5" id="prev-img" src="{{ Vite::asset('resources\img\placeholder-img.png') }}" alt="img">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Indirizzo</label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="Via Roma n. 1" value="{{ old('address', $restaurant?->address)}}">
        </div>
        @error('address')
        <p class="text-danger">{{ $message }}</p>
        @enderror
        <div class="mb-3">
            <label for="vat_number" class="form-label">Numero Partita IVA:</label>
            <input type="number" class="form-control @error('vat_number') is-invalid @enderror" id="vat_number" name="vat_number" placeholder="12345678901" value="{{ old('vat_number', $restaurant?->vat_number)}}">
        </div>
        @error('vat_number')
        <p class="text-danger">{{ $message }}</p>
        @enderror

        <button type="submit" class="btn btn-primary mt-3">Submit</button>

    </form>

</div>

<script>
    // {{-- * funzione per mostrare l'anteprima delle immagini
    function showImagePreview(event){
        const tagImage = document.getElementById('prev-img');
        tagImage.src = URL.createObjectURL(event.target.files[0]);

        // condizione non necessaria solo per rimuovere il padding alle images inserite
        if(tagImage){
        tagImage.classList.remove("px-5");
        }

    }
</script>

@endsection
