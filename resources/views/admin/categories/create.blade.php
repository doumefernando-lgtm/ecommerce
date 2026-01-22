@extends('admin.layout')

@section('content')
<form method="POST" action="{{ route('categories.store') }}">
@csrf
<input name="name" placeholder="Nom">
<button>Créer</button>
</form>
@endsection


