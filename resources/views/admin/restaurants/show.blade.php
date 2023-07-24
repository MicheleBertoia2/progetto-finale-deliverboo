@extends('layouts.admin')

@section('content')
    <section class="overflow-auto p-2 ms-3">

        <h1 class="pt-4 pb-3 d-block text-center">{{ $restaurant->name }}</h1>
        {{-- <h1 class="py-4 d-block text-center">{{ $restaurant->name }}</h1> --}}
        <div class="d-flex ristorante">
            {{-- <a href="{{ route('admin.dishes.create') }}" class="btn mybadge my-2 me-4 d-block w-50">Aggiungi un nuovo
                Piatto</a> --}}
                <div class="d-flex align-items-center mt-3 mb-3">
                    {{-- <a href="{{ route('admin.dishes.index') }}" class="btn btn-dark me-4">I tuoi Piatti</a> --}}

                    <a href="{{ route('admin.restaurants.edit', $restaurant) }}" class="btn btn-dark me-2"><i
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

            <div class="mt-3">
                @forelse ($restaurant->types as $type)
                <span class="badge mybadge p-2">
                    {{ $type->name }}
                </span>
            @empty
                <span class="badge mybadge p-2">
                    Empty
                </span>
            @endforelse
            </div>
    </div>


        <div class="mycard d-flex flex-wrap m-4 mt-3 justify-content-center">
            @if (str_contains($restaurant->image, 'http://') || str_contains($restaurant->image, 'https://'))
            <img src="{{ $restaurant?->image }}" alt="{{ $restaurant->name }}" class="py-2 ms-2">
            @elseif(str_contains($restaurant->image, 'resources/img/placeholder-img.png'))
            <img src="{{ Vite::asset($restaurant->image) }}" alt="{{ $restaurant->name }}" class="py-2 ms-2">
            @else
            <img src="{{ asset('storage/' . $restaurant?->image) }}" alt="{{ $restaurant->name }}" class="py-2 ms-2">
            @endif

            <span>
                <div class="ms-2">
                    <h6 class="py-2"><strong class="badge bg-black p-2">Id:</strong> {{ $restaurant->id }}</h6>
                    <h6 class="py-2"><strong class="badge bg-black p-2">Indirizzo:</strong> {{ $restaurant->address }}</h6>
                    <h6 class="py-2"><strong class="badge bg-black p-2">Partita IVA:</strong>
                    {{ $restaurant->vat_number }}</h6>
                </div>
            </span>



        </div>

        <div class="d-flex flex-column flex-lg-row justify-content-center align-items-center mt-4">
            <a href="{{ route('admin.dishes.index') }}" class="btn mybadge me-4 mybadge-button d-flex justify-content-center align-items-center">I tuoi Piatti</a>
            <a href="{{ route('admin.dishes.create') }}" class="btn mybadge my-2 me-4 mybadge-button d-flex justify-content-center align-items-center">Aggiungi un nuovo Piatto</a>
        </div>

    </section>
@endsection
