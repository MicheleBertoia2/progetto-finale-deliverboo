@extends('layouts.admin')

@section('content')
    <div class="container my-ctn">
        <h1 class="py-4">{{ $dish->name }}</h1>

        <div class="mb-3">
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
        <div class="card d-flex align-items-center" style="width: 18rem;">
            {{-- <img src="{{ $dish->image_path }}"
                class="{{ $dish->name }}" alt="">
                @if (asset("storage/".$dish->image_path))
                <img src="{{asset("storage/".$dish->image_path)}}"
                class="{{ $dish->name }}" alt="">
                @endif --}}

                <img src="{{ asset('storage/' . $dish?->image_path) }}" alt="">

            <div class="card-body">
                <h5 class="card-title">{{$dish->name}}</h5>
                <p class="card-text">{{$dish->ingredients}}</p>
                <div>
                    <span class="badge bg-success ">
                        prezzo:{{$dish->price}}</span>
                    <span class="badge bg-success">voto:{{$dish->vote}}</span>
                    <span class="badge bg-success">Visibile:
                        {{ $dish->is_visible ? 'Si' : 'No' }}
                </span>
                </div>
            </div>
        </div>

    </div>

@endsection
