@extends('layout')
@section('content')
    <div class="container mb-3">
        <a href="/admin" class="btn primary-btn bg-primary">
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
                        <form action="{{url('admin/deleteformation/'.$iteam->id)}}" method="get">
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
