@extends('admin.layout')

@section('content')
    <form method="POST"
      action="{{ route('products.update', $product) }}"
      enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div>
        <input name="name" value="{{ old('name', $product->name) }}" required>
    </div>

    <div>
        <input type="number" name="price" value="{{ old('price', $product->price) }}" required>
    </div>

    <div>
        <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" required>
    </div>

    <div>
        <textarea name="description">{{ old('description', $product->description) }}</textarea>
    </div>

    <!-- Image actuelle -->
    <div>
        @if ($product->image_url)
            <img src="{{ asset('storage/'.$product->image_url) }}"
                 alt="{{ $product->name }}"
                 width="120">
        @endif
    </div>

    <!-- Nouvelle image -->
    <div>
        <input type="file" name="image">
        <small>Laisser vide pour garder l'image actuelle</small>
    </div>

    <button type="submit">Modifier</button>
</form>
<a href="{{ route('products.index') }}">Retour</a>
@endsection




