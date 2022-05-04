<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>la liste des formateurs</title>
</head>
<body>
    @foreach ($formateurs as $iteam )
    <h3>{{$iteam->name}} </h3>
    <h3>{{$iteam->User->email}} </h3>
    <h3>{{$iteam->specialite}} </h3>
    <h3>{{$iteam->biography}} </h3>
     @foreach ($iteam->formation as $va )
    <h3>{{$va->intitule}} </h3>

    @endforeach
    <form action="{{url('admin/deleteFormateur/'.$iteam->id)}}" method="get">
        {{csrf_field()}}
         {{-- {{method_field('DELETE')}} --}}
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    @endforeach

</body>
</html>
=======
@extends('layout')
@section('content')
    <div class="container mb-3">
        <a href="{{ url()->previous() }}" class="btn primary-btn bg-primary">
            <i class="bi bi-arrow-left text-white"></i>
        </a>
    </div>
    <div class="container">
        <table class="table  table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">specialite</th>
                <th scope="col">biography</th>
                <th scope="col">Action</th>
                <th>Tutorials</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($formateurs as $iteam )
                <tr>
                    <th scope="row">{{$iteam->id}}</th>
                    <td>{{$iteam->name}}</td>
                    <td>{{$iteam->User->email}}</td>
                    <td>{{$iteam->specialite}}</td>
                    <td>{{$iteam->biography}}</td>
                    <td>
                        <form action="{{url('admin/delete/'.$iteam->id)}}" method="get">
                            {{csrf_field()}}
                            {{-- {{method_field('DELETE')}} --}}
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                    <td>
                        <ul>
                        @foreach ($iteam->formation as $va )
                            <li>{{$va->intitule}}</li>
                        @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
>>>>>>> fb962584c13b6912be13155ffb3e8dc79273d7b8
