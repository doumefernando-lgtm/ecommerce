@extends('admin.layout')

@section('content')
<h2>Produits</h2>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


<a href="{{ route('products.create') }}"> Ajouter</a>

<table class="table table-bordered">
    <tr>
        <th>Nom</th>
        <th>Catégorie</th>
        <th>Prix</th>
        <th>Stock</th>
        <th>Description</th>
        <th>Image</th>
        <th>Action</th>
    </tr>

        @foreach($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->category ? $product->category->name : '—' }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->stock }}</td>
            <td>{{ $product->description }}</td>
            <td>
                @if ($product->image_url)
        <img src="{{ asset('storage/'.$product->image_url) }}"
             alt="{{ $product->name }}"
             width="60">
    @else
        <img src="https://dummyimage.com/60x60/dee2e6/6c757d.jpg"
             alt="Image">
    @endif</td>
            <td><a href="{{ route('products.show', $product) }}">Voir</a>
            <a href="{{ route('products.edit', $product) }}">Modifier</a>

            <form method="POST" action="{{ route('products.destroy', $product) }}">
                @csrf @method('DELETE')
                <button>Supprimer</button>
            </form></td>
        </tr>
        
        @endforeach

</table>
@endsection
