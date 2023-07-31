@extends('layouts.admin')

@section('content')
    <div class="container p-5 form-img">
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
                <label for="name" class="form-label">Nome Piatto*</label>
                <input required id="name" minlength="2" maxlength="255" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" type="text"
                    placeholder="Esempio: Pizza Margherita">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione Piatto</label>

                <textarea id="description"  rows="4" class="form-control @error('description') is-invalid @enderror "
                    name="description" type="text">{!! old('description') !!}</textarea>
                    @error('description')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Prezzo* (valuta in €)</label>
                <input id="price" required minlength="1" pattern="[0-9.]*" class="form-control @error('price') is-invalid @enderror" name="price"
                    type="text" value="{{ old('price') }}" placeholder="Esempio: 5.00">
                @error('price')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="ingredients" class="form-label">Ingredienti*</label>
                <input id="ingredients" required class="form-control @error('ingredients') is-invalid @enderror" name="ingredients"
                    type="text" value="{{ old('ingredients') }}" placeholder="Esempio: Mozzarella, pomodoro">
                @error('ingredients')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image_path" class="form-label">Immagine*</label>
                <input onchange="showImagePreview(event)" type="text" class="" id="input-no-path-selected" name="noPathSelected"
                value="" style="opacity: 0; border: none; height: 0; width: 0;">
                <input required onchange="showImagePreview(event), handleFileSelection(event)" type="file" value="{{ old('image_path') }}" class="form-control @error('image_path') is-invalid @enderror" id="file_input" name="image_path">

                {{-- stato dell'immagine mostrata --}}
                <div class="mt-3" id="placeholderText" style="display: block;">Esempio immagine:</div>
                <div class="mt-3" id="imgUploaded" style="display: none;">Nuova immagine da caricare:</div>

                <div class="d-flex align-items-end flex-wrap div-img" >
                    <div>
                        <img height="300px" class="mt-3 bg-white" id="prev-img" src="{{ Vite::asset('resources\img\placeholder-img.png') }}" alt="">
                    </div>
                    <div>
                    {{-- * il button deve essere type="button" oppure diverrà automaticamnete type="submit" --}}
                    <button type="button" class="btn btn-danger ms-2 mt-3 d-none" id="deleteButton" onclick="deleteImage()"
                    style="width: 50px; height: 50px;"><span class="fa-solid fa-trash"></span><input id="inputDeleteImage" type="hidden" name="noImage" style="opacity: 0; border: none; height: 0; width: 0;"></button>
                    </div>
                </div>
                @error('image_path')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="is_visible" class="form-label my-3">Seleziona Visibilità</label>
                <select class="form-select" name="is_visible">
                    <option selected value="1">Visibile</option>
                    <option value="0">Non Visibile</option>
                </select>
            </div>



            <button type="submit" class="btn mybadge">Crea Piatto</button>


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

                // mostro il div con il testo "Nuova immagine da caricare:"
                const placeholderText = document.getElementById('placeholderText');
                const imgUploaded = document.getElementById('imgUploaded');

                placeholderText.style.display = 'none';
                imgUploaded.style.display = 'block';
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

                // mostro il div con il testo "Esempio immagine: placeholder-img.png"
                const placeholderText = document.getElementById('placeholderText');
                const imgUploaded = document.getElementById('imgUploaded');
                placeholderText.style.display = 'block';
                imgUploaded.style.display = 'none';
            }
        }

        function handleFileSelection(event) {
            // svuoto il valore dell'input nascosto
            const fileInput = document.getElementById('input-no-path-selected');
            fileInput.value = '';
            // Imposta il name dell'attributo nell'input = image_path
            document.getElementById('file_input').name = 'image_path';

            if(!fileInput.value == 'empty_input'){
                // abilito il button
                const buttonDelete = document.getElementById("deleteButton");
                buttonDelete.disabled = false;
                buttonDelete.classList.remove('d-none');
            }
        }

        function deleteImage() {

            // const tagImage = document.getElementById('prev-img');
            // tagImage.src = "{{ Vite::asset('resources/img/placeholder-img.png') }}";
            document.getElementById('prev-img').src = "{{ Vite::asset('resources/img/placeholder-img.png') }}";

            document.getElementById('file_input').name = 'image_path';
            document.getElementById('file_input').value = '';

            //imposto un valore che sarà uguale a quello passato al controller //* utile per quando l'immagine non è obbligatoria (cioè nullable) in questo caso l'immagune è obbligatoria
            document.getElementById("inputDeleteImage").value = "delete";

            // Disabilito il button
            const buttonDelete = document.getElementById("deleteButton");
            buttonDelete.disabled = true;
            buttonDelete.classList.add('d-none');

            // mostro il div con il testo "Esempio immagine: placeholder-img.png"
            const placeholderText = document.getElementById('placeholderText');
            const imgUploaded = document.getElementById('imgUploaded');

            placeholderText.style.display = 'block';
            imgUploaded.style.display = 'none';
        }

</script>
@endsection
