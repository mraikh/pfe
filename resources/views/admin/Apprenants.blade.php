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
                <th scope="col">Action</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($Apprenants as $iteam )
                <tr>
                    <th scope="row">{{$iteam->id}}</th>
                    <td>{{$iteam->name}}</td>
                    <td>{{$iteam->User->email}}</td>
                    <td>
                        <form action="{{url('admin/delete/'.$iteam->id)}}" method="get">
                            {{csrf_field()}}
                            {{-- {{method_field('DELETE')}} --}}
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                    <td>
                        @foreach ($iteam->inscription as $va )
                            {{$va->formation->intitule}}
                        @endforeach
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
