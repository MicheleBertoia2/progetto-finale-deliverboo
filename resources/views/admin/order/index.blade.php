@extends('layouts.admin')

@section('content')
    <h1>I Miei Ordini:</h1>

    <div class="container w-75">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome </th>
                    <th scope="col">Indirizzo </th>
                    <th scope="col">Mail </th>
                    <th scope="col">Telefono </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <th scope="row">{{$order->id}}</th>
                        <td>{{$order->customer_name}}</td>
                        <td>{{$order->customer_address}}</td>
                        <td>{{$order->customer_mail}}</td>
                        <td>{{$order->customer_phone}}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
