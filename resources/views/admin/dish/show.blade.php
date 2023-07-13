@extends('layouts.admin')

@section('content')
    <div class="container my-ctn">
        <h1>show details</h1>


        <div class="card d-flex align-items-center" style="width: 18rem;">
            <img src="{{$dish->image_path}}" class="{{$dish->name}}" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$dish->name}}</h5>
                <p class="card-text">{{$dish->ingredients}}</p>
                <div>
                    <span class="badge bg-success ">
                        prezzo:{{$dish->price}}</span>
                    <span class="badge bg-success">voto:{{$dish->vote}}</span>
                </div>
            </div>
        </div>

    </div>

@endsection
