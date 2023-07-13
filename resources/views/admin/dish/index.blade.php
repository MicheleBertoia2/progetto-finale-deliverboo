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
                    <a href="{{ route('admin.dishes.show', $dish) }}" class="btn btn-primary">vedi il dettaglio</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
