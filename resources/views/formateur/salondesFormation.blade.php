@extends('layout')
@section('content')
    <div class="container">
        <a href="/formateur" class="btn primary-btn bg-primary">
            <i class="bi bi-arrow-left text-white"></i>
        </a>
    </div>
    <div class="text-center">
        <h6 class="section-title bg-white mt-4 text-primary px-3">My Tutorials</h6>
    </div>
    <div class="container mb-3">
    <div class="row">
        @foreach ($formations as $item)
            <div class="col-sm-4">
                <div class="card m-2 bg-light" style="border-radius: 30px 30px 30px 30px ;">
                    <div class="card-body">
                        <div class="d-grid gap-2 d-md-flex  mb-2" role="group" aria-label="Basic example">

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" style="border-radius: 30px 30px 30px 30px ;" data-bs-target="#exampleModal">
                                edit
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="{{ ('/formateur/formations/'.$item->id.'/update') }}" method="POST">
                                        {{csrf_field()}}
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edite training</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="training name" class="form-label">Training name</label>
                                                    <input type="text" class="form-control" name="intitule" value="{{$item->intitule}}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="description" class="form-label">Description</label>
                                                    <textarea type="text" class="form-control" name="description">{{$item->description}}</textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary" value="save">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <form action="{{url('formateur/formations/'.$item->id.'/delete')}}" method="POST">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-sm btn-outline-danger" style="border-radius: 30px 30px 30px 30px;">Delete <i class="bi bi-trash-fill"></i></button>
                            </form>
                        </div>
                        <div class="text-center">
                            <h5 class="card-title text-primary">{{$item->intitule}}</h5>
                        </div>
                        <div class="card m-2 bg-light">
                            <p class="card-text p-2">{{$item->description}}</p>
                        </div>
                        <a href="{{('/formateur/formations/'.$item->id.'/view')}}" class="">
                            <div class="d-grid gap-1">
                                <button type="button" class="btn btn-outline-primary" style="border-radius: 30px 30px 30px 30px;"><i class="bi bi-arrow-right"></i></button>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
        <form method="get" action="{{ route('formateur.Createformations') }}">
            <a href="{{ route('formateur.Createformations') }}" class="btn btn-primary">New training</a>
        </form>
    </div>

@endsection
