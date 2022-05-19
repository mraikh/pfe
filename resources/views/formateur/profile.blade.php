@extends('layout')
@section('content')
    <div class="container">
        <a href="/formateur" class="btn primary-btn bg-primary">
            <i class="bi bi-arrow-left text-white"></i>
        </a>
    </div>
    <section style="">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            @if (!$formateur->user->photo)
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                                class="rounded-circle img-fluid" style="width: 150px;">
                            @else
                                    <img src="{{asset('storage/'.$formateur->user->photo)}}"  class="rounded-circle img-fluid" style="width: 150px;">
                            @endif
                            <h5 class="my-3">{{$formateur->name}}</h5>
    {{--                        <p class="text-muted mb-1">{{$formateur->specialite}}</p>--}}
                            <p class="text-muted mb-4">{{$formateur->biography}}</p>
                            <div class=" d-flex justify-content-center mb-2">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Change profile picture
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Change profile picture</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-footer text-center">
                                                <form action="{{url('formateur/ajouterPhotoprofile')}}" method="post" enctype="multipart/form-data">@csrf
                                                    <input type="hidden" name="id" value="{{$formateur->user->id}}">
                                                    <input  class="form-control form-control-sm" type="file" name="photo">
                                                    <button type="submit"  class="btn btn-primary">add profile picture</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Full Name</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$formateur->name}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$formateur->user->email}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Specialty</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$formateur->specialite}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Biography</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$formateur->biography}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        {{--les formation--}}
                        @foreach ($formateur->formation as $iteam )
                            <div class="col-md-6">
                                <div class="card mb-4 mb-md-0">
                                    <div class="card-body">
                                        <p class="mb-4 text-center"><span class="text-primary font-italic me-1">Tutorial:</span> {{$iteam->intitule}}
                                        </p>
                                        <ul>
                                            <li>
                                                @foreach ( $iteam->cour as $va )
                                                    <p class="mb-1">{{$va->intitule}}</p>
                                                @endforeach
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row m-2">
                        <form action="{{url('formateur/Editeprofile')}}" method="post" >
                            @csrf
                            <input type="hidden" name="id" value="{{$formateur->id}}">
                            <button type="submit" class="btn btn-secondary ms-1">Edite profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
