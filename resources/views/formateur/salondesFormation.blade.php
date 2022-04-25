@extends('layout')
@section('content')
<div class="contrainer">
    <div class="row">
        <div class="col-md-12"></div>

        <h1> la liste des formation</h1>
        <table class="table">
            <head>  <tr>
                <th>intitule</th>
                <th>description</th>

            </tr>
           </head>

             @if (session()->has('success'))
                <div class="alert alert-success">
{{session()->get('success')}}
                </div>
                @endif
                <form method="get" action="{{ route('formateur.Createformations') }}">
                 <a href="{{ route('formateur.Createformations') }}" class="btn btn-primary">nouveau formation</a> </form>
                @foreach ($formations as $item)
                <tr>
                    <td>{{$item->intitule}} </td><td> {{$item->description}} </td>
                    {{-- <form action="{{url('cvs/'.$item->id)}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <td> <a href="" class="btn btn-primary">detials</a>
                    <a href="{{('cvs/'.$item->id.'/edit')}}" class="btn btn-default">edit</a>
                    <button type="submit" class="btn btn-danger">supprime</button>
                    </td> --}}
                </tr>
                @endforeach
            {{-- </form> --}}


        </table>
    </div>
</div>
@endsection
