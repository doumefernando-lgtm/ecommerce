@extends('admin.layout')

@section('content')
    <h2>Commande #{{ $order->id }}</h2>
    <p>Status : {{ $order->status }}</p>

    @foreach($order->items as $item)
    <p>{{ $item->product->name }} x {{ $item->quantity }}</p>
    @endforeach
@endsection






