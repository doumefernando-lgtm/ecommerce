@extends('admin.layout')

@section('content')
<h2>Produits</h2>

<a href="/admin/products/create" class="btn btn-primary mb-3">+ Nouveau produit</a>

<table class="table table-bordered">
    <tr>
        <th>Nom</th>
        <th>Catégorie</th>
        <th>Prix</th>
        <th>Stock</th>
    </tr>

    @foreach($products as $product)
    <tr>
        <td>{{ $product->name }}</td>
        <td>{{ $product->category->name }}</td>
        <td>{{ $product->price }}</td>
        <td>{{ $product->stock }}</td>
    </tr>
    @endforeach
</table>
@endsection
