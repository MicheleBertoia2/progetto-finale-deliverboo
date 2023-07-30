@extends('layouts.admin')

@section('content')
    <div class="container mt-2">
        <a href="{{route('admin.orders.index')}}" class="btn mybadge m-3"> Torna Indietro</a>
        <table class="table table-striped mt-5">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Indirizzo</th>
                    <th scope="col">email</th>
                    <th scope="col">telefono</th>
                    <th scope="col">Prezzo</th>
                    <th scope="col">Data Ordine</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$order->customer_name}}</td>
                    <td>{{$order->customer_address}}</td>
                    <td>{{$order->customer_mail}}</td>
                    <td>{{$order->customer_phone}}</td>
                    <td>{{$order->total_price}} &euro;</td>
                    <td>{{$order->created_at}}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
