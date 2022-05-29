@extends('layout')
@section('content')
    <div class="container">
        <a href="/formateur" class="btn primary-btn bg-primary">
            <i class="bi bi-arrow-left text-white"></i>
        </a>
    </div>
    <div class="text-center">
        <h6 class="section-title bg-white mt-4 text-primary px-3">Training list</h6>
    </div>
    <div class="container mb-3">
    <div class="row">
        @foreach ($formations as $item)
            <div class="col-sm-4">
                <div class="card m-2">
                    <div class="card-header bg-light text-center">
                        <h5 class="card-title text-primary">{{$item->intitule}}</h5>
                    </div>
                    <div class="card-body">
                        <small class="text-dark">descreption:</small>
                        <p class="card-text text-center">{{$item->description}}</p>
                    </div>
                    <div class="card-footer text-center">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{('/formateur/formations/'.$item->id.'/view')}}" class="">
                                <button type="button" class="btn btn-primary">detials</button>
                            </a>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
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
