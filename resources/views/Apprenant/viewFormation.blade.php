@extends('layout')
@section('content')
<div class="contrainer">
    <div class="row">
        <div class="col-md-12"></div>

        <h1> la  formation</h1>
<p>{{$formation->intitule}}
    {{$formation->description}} le prof: {{$formation->Formateur->name}}</p>

               @if (session()->has('success'))
                <div class="alert alert-success">
         {{session()->get('success')}}
                </div>
                @endif
                 @foreach ($cours as $item)
                <tr>
                    <td>{{$item->intitule}} </td><td> {{$item->description}} </td><td> {{$item->duree}}h</td>

                </tr><br>

                @foreach ($item->chapitre as $va)
                <tr>
                    <td>{{$va->description}} </td>

                    <a href="{{asset('storage/'.$va->file)}}"  class="">pdf chapitre</a>
                    <br>

                </tr>
                @endforeach
                @endforeach
            </table>
    </div>
</div>

@endsection
