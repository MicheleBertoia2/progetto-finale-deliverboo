@extends('layouts.admin')

@section('content')
    <section class="container overflow-auto p-2 ms-3">

        <h1 class="py-4 d-block text-center">{{ $restaurant->name }}</h1>
        <div class="d-flex ristorante">
            <a href="{{ route('admin.dishes.create') }}" class="btn mybadge my-2 me-4 d-block w-50">Aggiungi un nuovo
                Piatto</a>
            <div>
                <a href="{{ route('admin.dishes.index') }}" class="btn btn-dark mt-2 me-4">I tuoi Piatti</a>

                <a href="{{ route('admin.restaurants.edit', $restaurant) }}" class="btn btn-dark"><i
                    class="fa-solid fa-pencil"></i>
                </a>
                <form action="{{ route('admin.restaurants.destroy', $restaurant) }}" method="POST" class="d-inline"
                onsubmit="return confirm('Confermi l\'eliminazione del ristorante: {{ $restaurant->name }} ?')">
                @csrf
                {{-- * aggiungere DELETE perchè non è possibile inserire PUT/PATCH nel method del form al posto di POST --}}
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                </form>
            </div>

            <div class="m-2">
                @forelse ($restaurant->types as $type)
                <span class="badge mybadge">
                    {{ $type->name }}
                </span>
            @empty
                <span class="badge mybadge">
                    empty
                </span>
            @endforelse
            </div>
    </div>


        <div class="mycard d-flex flex-wrap m-5 justify-content-center">
            @if (str_contains($restaurant->image, 'http://') || str_contains($restaurant->image, 'https://'))
            <img src="{{ $restaurant?->image }}" alt="{{ $restaurant->name }}" class="py-2 ms-2">
            @elseif(str_contains($restaurant->image, 'resources/img/placeholder-img.png'))
            <img src="{{ Vite::asset($restaurant->image) }}" alt="{{ $restaurant->name }}" class="py-2 ms-2">
            @else
            <img src="{{ asset('storage/' . $restaurant?->image) }}" alt="" class="py-2 ms-2">
            @endif

            <span>
                <div class="ms-2">
                    <h6 class="py-2"><strong class="badge bg-black">Id:</strong> {{ $restaurant->id }}</h6>
                    <h6 class="py-2"><strong class="badge bg-black">Indirizzo:</strong> {{ $restaurant->address }}</h6>
                    <h6 class="py-2"><strong class="badge bg-black">Partita IVA:</strong>
                    {{ $restaurant->vat_number }}</h6>
                </div>
            </span>



        </div>

    </section>
@endsection
