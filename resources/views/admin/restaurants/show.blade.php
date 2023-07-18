@extends('layouts.admin')

@section('content')


<div class="container overflow-auto p-5 d-flex flex-column align-items-center" style="max-height: calc(100vh - 70.24px);">

    {{-- @dump($restaurant); --}}
    <h1 class="py-4">{{ $restaurant->name }}


        <a href="{{ route('admin.restaurants.edit', $restaurant) }}" class="btn btn-primary"><i class="fa-solid fa-pencil"></i></a>
        <form action="{{ route('admin.restaurants.destroy', $restaurant) }}" method="POST" class="d-inline" onsubmit="return confirm('Confermi l\'eliminazione del ristorante: {{ $restaurant->name }} ?')">
            @csrf
            {{--* aggiungere DELETE perchè non è possibile inserire PUT/PATCH nel method del form al posto di POST --}}
            @method('DELETE')
            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
        </form>
    </h1>
    @if(str_contains($restaurant->image, 'http://') || str_contains($restaurant->image, 'https://'))
    <img src="{{ $restaurant->image ? $restaurant->image : Vite::asset('resources/img/placeholder-img.png') }}" class="py-2 w-25" alt="{{ $restaurant->image == false ? "Nessuna immagine" : $restaurant->name }}">
    @else
    <img src="{{ $restaurant->image ? asset('storage/'. $restaurant->image) : Vite::asset('resources/img/placeholder-img.png') }}" class="py-2 w-25" alt="{{ $restaurant->image == false ? "Nessuna immagine" : $restaurant->name }}">
    @endif
    <h6 class="py-2"><strong class="text-decoration-underline">Id:</strong> {{ $restaurant->id }}</h6>
    <h6 class="py-2"><strong class="text-decoration-underline">Nome:</strong> {{ $restaurant->name }}</h6>
    <h6 class="py-2"><strong class="text-decoration-underline">Indirizzo:</strong> {{ $restaurant->address }}</h6>
    <h6 class="py-2"><strong class="text-decoration-underline">Numero Partita IVA:</strong> {{ $restaurant->vat_number }}</h6>


</div>

@endsection
