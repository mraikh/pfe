@extends('layout')
@section('content')
    <div class="container">
        <a href="/formateur/formations/{{$id}}/view" class="btn primary-btn bg-primary">
            <i class="bi bi-arrow-left text-white"></i>
        </a>
    </div>
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0  my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image">
                                <img src="{{asset('img/createcour.png')}}" class="col-lg-12  d-lg-block" alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Creat new training</h1>
                                    </div>
                                    <form action="{{('/formateur/formations/cours/store/'.$id)}}" method="POST">
                                        {{csrf_field()}}
                                        <div class="mb-3">
                                            <label for="Course name" class="form-label">Course name</label>
                                            <input type="text" class="form-control" name="intitule" value="{{old('intitule')}}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea type="text" class="form-control" name="description">{{old('description')}}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="training name" class="form-label">Period in hours </label>
                                            <input type="number" class="form-control" name='duree' value="{{old('duree')}}">
                                        </div>
                                        <button type="submit" class="btn btn-primary" value="save">Save</button>
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
