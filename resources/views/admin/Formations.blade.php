<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>la liste des Formations</title>
</head>
<body>
    @foreach ($Formations as $iteam )
    <h3>{{$iteam->intitule}} </h3>
    <h3>{{$iteam->description}} </h3>

     @foreach ($iteam->cour as $va )
     <h3>{{$va->intitule}} </h3>
     <h3>{{$va->description}} </h3>
     <h1>___________</h1>

    @endforeach
    <form action="{{url('admin/deleteformation/'.$iteam->id)}}" method="get">
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
                <th scope="col">Tutorial's name</th>
                <th scope="col">Description</th>
                <th scope="col">Courses list</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($Formations as $iteam)
                <tr>
                    <th scope="row">{{$iteam->id}}</th>
                    <td>{{$iteam->intitule}}</td>
                    <td>{{$iteam->description}}</td>
                    <td>
                        <ul>
                            @foreach ($iteam->cour as $va )
                                <li>
                                    <h6>{{$va->intitule}}</h6>
                                    <small>{{$va->description}} </small>
                                </li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <form action="{{url('admin/delete/'.$iteam->id)}}" method="get">
                            {{csrf_field()}}
                            {{-- {{method_field('DELETE')}} --}}
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
>>>>>>> fb962584c13b6912be13155ffb3e8dc79273d7b8
