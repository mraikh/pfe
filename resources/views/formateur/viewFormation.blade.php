@extends('layout')
@section('content')
<div class="contrainer">
    <div class="row">
        <div class="col-md-12"></div>

        <h1> la  formation</h1>
<p>{{$formation->intitule}}
    {{$formation->description}}</p>

               @if (session()->has('success'))
                <div class="alert alert-success">
         {{session()->get('success')}}
                </div>
                @endif
                <form method="get" action="{{ route('formateur.CreateCour') }}">
                 <a href="{{ route('formateur.CreateCour') }}" class="btn btn-primary">nouveau formation</a> </form>
                @foreach ($Cour as $item)
                <tr>
                    <td>{{$item->intitule}} </td><td> {{$item->description}} </td>
                {<form action="{{url('formateur/Cour/'.$item->id.'/delete')}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                     <td> <a href="{{('/formateur/Cour/'.$item->id.'/view')}}" class="btn btn-primary">detials</a>
                   <td> <a href="{{('/formateur/Cour/'.$item->id.'/edit')}}" class="btn btn-default">edit</a>
                   <button type="submit" class="btn btn-danger">supprime</button>
                    </td>
                    </td>
                </tr>
                @endforeach
            </table>
    </div>
</div>

@endsection
