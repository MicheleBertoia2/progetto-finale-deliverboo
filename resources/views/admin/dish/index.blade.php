@extends('layouts.admin')

@section('content')
    <div class="container ">
        <h1 class="py-4">Piatti</h1>
        <div class="row">
        @foreach ($dishes as $dish)
            <div class="card m-1" style="width: 18rem;">
                <img src="{{ $dish->image_path }}" class="{{ $dish->name }}" alt="{{ $dish->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $dish->name }}</h5>
                    <p class="card-text">{{ $dish->ingredients }}</p>
                    <div class="mb-2">
                        <span class="badge bg-success ">
                            prezzo:{{$dish->price}}</span>
                        <span class="badge bg-success">voto:{{$dish->vote}}</span>
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
