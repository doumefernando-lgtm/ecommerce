@extends('admin.layout')

@section('content')
<h2>{{ $category->name }}</h2>

<a href="{{ route('categories.index') }}">Retour</a>
@endsection


