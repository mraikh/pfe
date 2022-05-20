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
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Formation</th>
                <th scope="col">Action</th>

            </tr>
            </thead>
            <tbody>
            @foreach ($Apprenants as $iteam )
                <tr>
                    <th scope="row">{{$iteam->id}}</th>
                    <td>{{$iteam->name}}</td>
                    <td>{{$iteam->User->email}}</td>
                    <td>
                        <ul>
                        @foreach ($iteam->inscription as $va )
                            <li>{{$va->formation->intitule}}</li>
                        @endforeach
                        </ul>
                    </td>
                    <td> <form action="{{url('admin/deleteApprenant/'.$iteam->id)}}" method="get">
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
