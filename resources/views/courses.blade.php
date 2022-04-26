@extends('layout')
@section('content')
<h1>courses

</h1>
@foreach ($cours as $item)
<table>
<tr>
    <td>{{$item->intitule}} </td><td> {{$item->description}} </td><td> {{$item->duree}}h </td></tr>
</table>

    @endforeach
@endsection
