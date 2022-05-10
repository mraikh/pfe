@extends('layout')
@section('content')
    <div class="container mb-2">
        <a href="/formateur" class="btn primary-btn bg-primary">
            <i class="bi bi-arrow-left text-white"></i>
        </a>
    </div>
    <div class="container">
        @foreach ($formations as $iteam )
            <div class="card mb-3">
                <div class="card-header">
                    <h3 class="text-center">{{$iteam->intitule}}</h3>
                </div>
                <div class="card-body">
                    @foreach ($iteam->inscription as $va)
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$va->Apprenant->name}}</td>
                                    <td>{{$va->Apprenant->User->email}}</td>
                                    <td>
                                        <form action={{url('formateur/remove')}}  method="post">
                                            {{csrf_field()}}
                                            <input type="hidden" value="{{$va->id}} " name="id">
                                            <button type="submit" class="btn btn-primary">delete</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@endsection
