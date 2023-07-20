@extends('layouts.admin')

@section('content')
    <div class="container overflow-auto p-5 d-flex flex-column align-items-center" style="max-height: calc(100vh - 70.24px);">

        {{-- @dump($restaurant); --}}
        <h1 class="py-4">{{ $restaurant->name }}
            <div class="d-flex  justify-content-between">
                <a href="{{ route('admin.dishes.create') }}" class="btn btn-primary mt-2 me-4 ">Aggiungi un nuovo Piatto</a>

                <a href="{{ route('admin.dishes.index') }}" class="btn btn-primary mt-2 me-4">I tuoi Piatti</a>
            </div>

            <div class="mt-3">
                @forelse ($restaurant->types as $type)
                    <span class="badge bg-secondary">
                        {{ $type->name }}
                    </span>
                @empty
                    <span class="badge bg-secondary">
                        empty
                    </span>
                @endforelse

                <a href="{{ route('admin.restaurants.edit', $restaurant) }}" class="btn btn-primary"><i
                        class="fa-solid fa-pencil"></i></a>
                <form action="{{ route('admin.restaurants.destroy', $restaurant) }}" method="POST" class="d-inline"
                    onsubmit="return confirm('Confermi l\'eliminazione del ristorante: {{ $restaurant->name }} ?')">
                    @csrf
                    {{-- * aggiungere DELETE perchè non è possibile inserire PUT/PATCH nel method del form al posto di POST --}}
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                </form>
            </div>
        </h1>

        @if(str_contains($restaurant->image, 'http://') || str_contains($restaurant->image, 'https://'))
            <img src="{{  $restaurant?->image }}" alt="{{ $restaurant->name }}" class="py-2 w-25">
        @elseif(str_contains($restaurant->image, "resources/img/placeholder-img.png" ))
            <img src="{{ Vite::asset($restaurant->image) }}" alt="{{ $restaurant->name }}" class="py-2 w-25">
        @else
            <img src="{{ asset('storage/' . $restaurant?->image) }}" alt="" class="py-2 w-25">
        @endif

        <h6 class="py-2"><strong class="text-decoration-underline">Id:</strong> {{ $restaurant->id }}</h6>
        <h6 class="py-2"><strong class="text-decoration-underline">Nome:</strong> {{ $restaurant->name }}</h6>
        <h6 class="py-2"><strong class="text-decoration-underline">Indirizzo:</strong> {{ $restaurant->address }}</h6>
        <h6 class="py-2"><strong class="text-decoration-underline">Numero Partita IVA:</strong>
            {{ $restaurant->vat_number }}</h6>


    </div>
@endsection
