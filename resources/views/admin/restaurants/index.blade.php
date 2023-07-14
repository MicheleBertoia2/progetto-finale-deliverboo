@extends('layouts.admin')

@section('content')

<div class="container overflow-auto p-5 d-flex flex-column align-items-center" style="max-height: calc(100vh - 70.24px);">

    {{-- * stampo l'alert dopo l'ELIMINAZIONE del progetto e solo se in sessione è presente la variabile "deleted" (in ProjectController.php) --}}
    {{-- @if (session('deleted'))
        <div class="alert alert-success" role="alert">
        {{ session('deleted') }}
        </div>
    @endif --}}

    <h1 class="py-4">Ristoranti</h1>

    <table class="table table-hover">
        <thead class="thead-dark">
        <tr class="">
            <th scope="col">#ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Indirizzo</th>
            <th scope="col">Azioni</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($restaurants as $restaurant)
            {{-- @dump($restaurant) --}}
            <tr>
                <td>{{ $restaurant->id }}</td>
                <td>{{ $restaurant->name }}</td>
                <td>{{ $restaurant->address }}</td>
                <td>
                    <a href="{{ route('admin.restaurants.show', $restaurant) }}" class="btn btn-primary"><i class="fa-regular fa-eye"></i></a>
                    {{--* button per EDIT (modificare il singolo progetto) --}}
                    <a href="{{ route('admin.restaurants.edit', $restaurant) }}" class="btn btn-primary"><i class="fa-solid fa-pencil"></i></a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    <div>
        {{ $restaurants->links() }}
    </div>

</div>

@endsection
