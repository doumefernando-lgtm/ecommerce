@extends('admin.layout')

@section('content')
<h2>Commandes</h2>

<table class="table">
<tr>
    <th>ID</th>
    <th>Client</th>
    <th>Total</th>
    <th>Status</th>
</tr>

@foreach($orders as $order)
<tr>
    <td>#{{ $order->id }}</td>
    <td>{{ $order->user->name }}</td>
    <td>{{ $order->total }}</td>
    <td>{{ $order->status }}</td>
</tr>
@endforeach
</table>
<a href="{{ route('products.index') }}">Retour</a>
@endsection
