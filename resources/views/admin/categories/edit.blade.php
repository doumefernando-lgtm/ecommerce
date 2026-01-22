@extends('admin.layout')

@section('content')

    <form method="POST" action="{{ route('categories.update', $category) }}">
    @csrf @method('PUT')
    <input name="name" value="{{ $category->name }}">
    <button>Modifier</button>
    </form>

@endsection



