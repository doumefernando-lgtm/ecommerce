@extends('admin.layout')

@section('content')
<h2>Catégories</h2>

<table class="table">
@foreach($categories as $category)
<tr>
    <td>{{ $category->name }}</td>
</tr>
@endforeach
</table>
@endsection
