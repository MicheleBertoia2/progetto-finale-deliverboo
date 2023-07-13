@extends('layouts.admin')

@section('content')
<div class="container p-5">
    <div  class="mb-5">
        <h2 class="fs-4 text-secondary my-4">
        Home dashboard
        </h2>

        <a href="{{ route('admin.restaurants.create') }}" class="btn btn-primary mt-2">Aggiungi un nuovo ristorante</a>
    </div>



@endsection
