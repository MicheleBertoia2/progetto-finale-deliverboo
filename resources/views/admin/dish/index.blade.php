@extends('layouts.admin')

@section('content')
    <div class="container ">
        <div class="py-4">
            <h1 class="d-inline-block"> Piatti</h1>
            <a href="{{ route('admin.dishes.create') }}" class="btn btn-primary m-3">Nuovo Piatto <i
                class="fa-solid fa-plus"></i>
            </a>
        </div>

        <div class="row">
        @foreach ($dishes as $dish)
            <div class="card m-1" style="width: 18rem;">


                <img src="{{ asset('storage/' . $dish?->image_path) }}" alt="">

                <div class="card-body">
                    <h5 class="card-title">{{ $dish->name }}</h5>
                    <p class="card-text">{{ $dish->ingredients }}</p>
                    <div class="mb-2">
                        <span class="badge bg-success ">
                            prezzo:{{$dish->price}}</span>
                        <span class="badge bg-success">voto:{{$dish->vote}}</span>
                        <span class="badge bg-success">Visibile:
                            {{ $dish->is_visible ? 'Si' : 'No' }}
                    </span>
                    </div>
                    <div>
                        <a href="{{ route('admin.dishes.show', $dish) }}" class="btn btn-primary"><i
                            class="fa-solid fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.dishes.edit', $dish) }}" class="btn btn-primary"><i
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
