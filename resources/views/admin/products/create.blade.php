@extends('admin.layout')

@section('content')
    <form method="POST" action="{{ route('products.store') }}"  enctype="multipart/form-data">
    @csrf
    <select name="category_id" required>
            <option value="">-- Sélectionner une catégorie --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    <input name="name" placeholder="Nom">
    <input name="price" placeholder="Prix">
    <input name="stock" placeholder="Stock">
    <textarea name="description"></textarea>
    <input type="file" name="image">

    <button>Créer</button>
    </form>
@endsection



