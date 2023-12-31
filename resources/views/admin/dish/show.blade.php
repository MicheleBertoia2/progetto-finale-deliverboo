@extends('layouts.admin')

@section('content')
    <div class="container my-ctn">

        <h1 class="py-4">{{ $dish->name }}</h1>

        <div class="mb-3">

            <a href="{{ route('admin.dishes.edit', $dish) }}" class="btn btn-dark"><i
                class="fa-solid fa-pencil"></i>
            </a>
            {{-- <form class="d-inline" action="{{ route('admin.dishes.destroy', $dish) }}"
                    method="POST"
                    onsubmit="return confirm('Confermi l\'eliminazione del carattere:  {{ $dish->name }} ?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" title="delete"><i
                            class="fa-solid fa-trash"></i></button>
                </form> --}}
                @include('admin.partials.form-delete',[
                    'title'=>'Eliminazione Piatto',
                    'id'=> $dish->id,
                    'message'=> "Confermi l'eliminazione del piatto $dish->name?",
                    'route' => route('admin.dishes.destroy', $dish)
                ])
        </div>
        <div class="m-3">
            <span class="badge mybadge p-2">
                Prezzo: {{$dish->price}}€</span>
            <span class="badge mybadge p-2">Visibile:
                {{ $dish->is_visible ? 'Si' : 'No' }}
        </span>
        </div>

        <div class="d-flex align-items-center mycard m-2" >

            @if(str_contains($dish->image_path, 'http://') || str_contains($dish->image_path, 'https://'))
                <img src="{{  $dish?->image_path }}" alt="{{ $dish->name }}">
            @elseif(str_contains($dish->image_path, "resources/img/placeholder-img.png" ))
                <img src="{{ Vite::asset($dish->image_path) }}" alt="{{ $dish->name }}">
            @else
                <img src="{{ asset('storage/' . $dish?->image_path) }}" alt="{{ $dish->name }}">
            @endif

        </div>
        <div class="body mt-2">
            <p class="card-text"><strong>Descrizione: </strong>{{$dish->description}}</p>
            <p class="card-text"><strong>Ingredienti: </strong>{{$dish->ingredients}}</p>
        </div>
        <a href="{{ route('admin.dishes.index') }}"
        class="btn mybadge m-2 mt-4 ">Torna ai tuoi Piatti</a>

    </div>

@endsection


