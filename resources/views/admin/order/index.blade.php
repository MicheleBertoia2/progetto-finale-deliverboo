@extends('layouts.admin')

@section('content')
<h1 class="m-5">I Miei Ordini:</h1>

<div class="container w-75">
    <div class="accordion " id="accordionExample">
        @foreach ($orders as $order)
        <div class="accordion-item my-4">
            <h2 class="accordion-header">
                <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $order->id }}" aria-expanded="true" aria-controls="collapse{{ $order->id }}">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Indirizzo </th>
                                <th scope="col">Telefono </th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <th scope="row">{{$order->id}}</th>
                                    <td>{{$order->customer_name}}</td>
                                    <td>{{$order->customer_address}}</td>
                                    <td>{{$order->customer_phone}}</td>
                                </tr>
                        </tbody>
                    </table>
                </button>
            </h2>
            <div id="collapse{{ $order->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">

                    <table class="table table-body">
                        <thead>
                            <tr class="tr-body">
                                <th scope="col ">email</th>
                                <th scope="col ">Prezzo</th>
                                <th scope="col ">Data Ordine</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr >
                                <td >{{$order->customer_mail}}</td>
                                <td>{{$order->total_price}} &euro;</td>
                                <td>{{ date_format(date_create($order->created_at), 'd/m/Y H:i') }}</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        @endforeach
    </div>

    </div>
@endsection
