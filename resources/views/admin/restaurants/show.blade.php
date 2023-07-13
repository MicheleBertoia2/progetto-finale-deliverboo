@extends('layouts.admin')

@section('content')


<div class="container overflow-auto p-5 d-flex flex-column align-items-center" style="max-height: calc(100vh - 70.24px);">

    {{-- @dump($restaurant); --}}
    <h1 class="py-4">{{ $restaurant->name }}</h1>
    {{-- <img src="{{ $restaurant->image ? asset('storage/' . $restaurant->image) : Vite::asset('resources/img/placeholder-img.png') }}" class="py-2 w-25" alt="{{ $restaurant->image == false ? "No image" : $restaurant->name }}"> --}}
    {{-- ! oppure --}}
    <img src="{{ $restaurant->image_path ? asset('storage/' . $restaurant->image_path) : Vite::asset('resources/img/placeholder-img.png') }}" class="py-2 w-25" alt="{{ $restaurant->image_path == false ? "No image" : $restaurant->name }}">
    <h6 class="py-2"><strong class="text-decoration-underline">Id:</strong> {{ $restaurant->id }}</h6>
    <h6 class="py-2"><strong class="text-decoration-underline">Nome:</strong> {{ $restaurant->nome }}</h6>
    <h6 class="py-2"><strong class="text-decoration-underline">Indirizzo:</strong> {{ $restaurant->address }}</h6>
    <h6 class="py-2"><strong class="text-decoration-underline">Numero Partita IVA:</strong> {{ $restaurant->vat_number }}</h6>


</div>

@endsection
