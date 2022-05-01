@extends('layout')
@section('content')
<div class="contrainer">
    <div class="row">
        <div class="col-md-12"></div>

        <h1> la  formation</h1>
<p>{{$cour->intitule}}
    {{$cour->description}} le prof: {{$cour->Formateur->name}}</p>

               @if (session()->has('success'))
                <div class="alert alert-success">
         {{session()->get('success')}}
                </div>
                @endif
                 @foreach ( $chapitres as $item)
                <tr>
                    <td>{{$item->intitule}} </td><td> {{$item->description}} </td><td> {{$item->duree}}h</td>
                    <form action="{{url('apprenant/inscription/'.$item)}}" method="POST">
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-primary" value="save">inscri</button>
                    </form>
                </tr>
                @endforeach
            </table>
    </div>
</div>

@endsection
