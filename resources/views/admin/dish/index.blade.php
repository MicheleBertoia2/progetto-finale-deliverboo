@extends('layouts.admin')

@section('content')
    <div class="container ">
        <h1>index dish</h1>

        @foreach ($dishes as $dish)
            <div class="card" style="width: 18rem;">
                <img src="{{ $dish->image_path }}" class="{{ $dish->name }}" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $dish->name }}</h5>
                    <p class="card-text">{{ $dish->ingredients }}</p>
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
@endsection
