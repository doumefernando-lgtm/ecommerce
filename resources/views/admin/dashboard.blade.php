@extends('admin.layout')

@section('content')
<h1>Dashboard</h1>

<table class="table table-bordered">
<th>Produits</th>
<th>Commandes</th>


    @if (isset($products))
        
    @foreach($products as $product)
    <tr>
         <td> {{ $product->name }} </td>
    </tr>
       
    @endforeach
        @else {{ 'pas de produits' }}
    @endif
    <td></td>


</table>
@endsection
