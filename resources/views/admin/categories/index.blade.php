
@extends('admin.layout')

@section('content')
<h2>Catégories</h2>

<a href="{{ route('categories.create') }}"> Ajouter</a>

<table class="table table-bordered">
    <tr>
        <th>Nom</th>
        <th>Actions</th>
    </tr>

        @foreach($categories as $category)
        <tr>
            <td> {{ $category->name }}</td>
            <td>
                <a href="{{ route('categories.show', $category) }}">Voir</a>
                <a href="{{ route('categories.edit', $category) }}">Modifier</a>

                <form method="POST" action="{{ route('categories.destroy', $category) }}">
                    @csrf @method('DELETE')
                    <button>Supprimer</button>
                </form>
            </td>
        </tr>
        <p>
           
            
        </p>
        @endforeach

</table>
@endsection
