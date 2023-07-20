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

        <form action="{{ route('admin.dishes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf


            <div class="mb-3">
                <label for="name" class="form-label">Nome Piatto</label>
                <input required id="name" minlength="2" maxlength="255" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" type="text"
                    placeholder="Nome Piatto">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione Prodotto</label>

                <textarea id="description"  rows="4" class="form-control @error('description') is-invalid @enderror "
                    name="description" type="text" placeholder="Descrizione piatto">{!! old('description') !!}</textarea>
                    @error('description')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                <input id="price" required minlength="1" pattern="[0-9.]*" class="form-control @error('price') is-invalid @enderror" name="price"
                    type="text" value="{{ old('price') }}" placeholder="inserisci il prezzo">
                @error('price')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="ingredients" class="form-label">Ingredienti</label>
                <input id="ingredients" required class="form-control @error('ingredients') is-invalid @enderror" name="ingredients"
                    type="text" value="{{ old('ingredients') }}" placeholder="Ingredienti">
                @error('ingredients')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3" style="width: 150vh; max-width: 73vw;">
                <label for="image_path" class="form-label">Immagine</label>
                <input required onchange="showImagePreview(event)" type="file" value="{{ old('image_path') }}" class="form-control @error('image_path') is-invalid @enderror" id="image_path" name="image_path">
                <img height="300px" class="mt-3 bg-white px-5" id="prev-img" src="{{ Vite::asset('resources\img\placeholder-img.png') }}" alt="">
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
