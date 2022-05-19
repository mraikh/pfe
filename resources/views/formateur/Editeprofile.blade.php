@extends('layout')
@section('content')
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image">
                                <img src="{{asset('img/editprofileimg.png')}}" class="col-lg-12  d-lg-block" alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4 text-primary">Edite profile</h1>
                                    </div>
                                    <form action="{{url('formateur/updateprofile')}}" method="post">
                                        @csrf
                                        <input type="hidden"  name="id" value="{{$id}}" >
                                                <div class="row">
                                                    <div class="col">
                                                        <label class="form-label">Full Name</label>
                                                    </div>
                                                    <div class="col">
                                                        <input class="form-control" type="text" name="name" value="{{$formateur->name}}">
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col">
                                                        <label class="form-label">Email</label>
                                                    </div>
                                                    <div class="col">
                                                        <input class="form-control" type="text" name="email" value="{{$formateur->user->email}}">
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col">
                                                        <label class="form-label">Specialty</label>
                                                    </div>
                                                    <div class="col">
                                                        <input class="form-control" type="text" name="specialite" value="{{$formateur->specialite}}">
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col">
                                                        <label  class="form-label">Biography</label>
                                                    </div>
                                                    <div class="col">
                                                        <input class="form-control" type="text" name="biography" value="{{$formateur->biography}}">
                                                    </div>
                                                </div>
                                        <button type="submit" class="btn btn-primary ms-1 text-center"> save</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

@endsection
