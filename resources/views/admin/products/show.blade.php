@extends('admin.layout')

@section('content')
<h2>{{ $product->name }}</h2>
<p>{{ $product->description }}</p>
<p>Prix : {{ $product->price }}</p>
<p>Stock : {{ $product->stock }}</p>
@if($product->image_url)
    <p><img src="{{ asset('storage/'.$product->image_url) }}" width="200"></p>
@endif


<a href="{{ route('products.index') }}">Retour</a>
@endsection



