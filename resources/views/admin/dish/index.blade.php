@extends('layouts.admin')

@section('content')
    <div class="container ">
        <div class="py-4">
            <h1 class="d-inline-block"> Piatti</h1>
            <a href="{{ route('admin.dishes.create') }}" class="btn mybadge m-3">Nuovo Piatto <i
                class="fa-solid fa-plus"></i>
            </a>
        </div>

        <div class="row ms-3">
        @foreach ($dishes as $dish)
            <div class="card m-1" style="width: 18rem;">

                @if(str_contains($dish->image_path, 'http://') || str_contains($dish->image_path, 'https://'))
                    <img src="{{  $dish?->image_path }}" alt="{{ $dish->name }}">
                @elseif(str_contains($dish->image_path, "resources/img/placeholder-img.png" ))
                    <img src="{{ Vite::asset($dish->image_path) }}" alt="{{ $dish->name }}">
                @else
                    <img src="{{ asset('storage/' . $dish?->image_path) }}" alt="{{ $dish->name }}">
                @endif

                <div class="card-body">
                    <h5 class="card-title">{{ $dish->name }}</h5>
                    <p class="card-text">{{ $dish->ingredients }}</p>
                    <div class="mb-2">
                        <span class="badge mybadge ">
                            prezzo:{{$dish->price}}</span>
                        <span class="badge mybadge">Visibile:
                            {{ $dish->is_visible ? 'Si' : 'No' }}
                    </span>
                    </div>
                    <div>
                        <a href="{{ route('admin.dishes.show', $dish) }}" class="btn btn-dark"><i
                            class="fa-solid fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.dishes.edit', $dish) }}" class="btn btn-dark"><i
                            class="fa-solid fa-pencil"></i>
                        </a>
                        <form class="d-inline" action="{{ route('admin.dishes.destroy', $dish) }}"
                                method="POST"
                                onsubmit="return confirm('Confermi l\'eliminazione del carattere:  {{ $dish->name }} ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" title="delete"><i
                                        class="fa-solid fa-trash"></i></button>
                            </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
