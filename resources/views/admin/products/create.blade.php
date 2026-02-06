@extends('admin.layout')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form method="POST" action="{{ route('products.store') }}"  enctype="multipart/form-data">
    @csrf
    <select name="category_id" >
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

    <button type="submit">Créer</button>
    </form>
@endsection



