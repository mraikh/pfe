@extends('layout')
@section('content')
    <div class="container">
        <a href="/formateur/formations/{{$cour->formation->id}}/view" class="btn primary-btn bg-primary">
            <i class="bi bi-arrow-left text-white"></i>
        </a>
    </div>
    <div class="text-center">
        <h6 class="section-title bg-white mt-4 text-primary px-3">{{$cour->intitule}} course</h6>
    </div>
{{--    <div class="container">--}}
{{--        <p>{{$cour->description}}</p>--}}
{{--    </div>--}}
    <div class="container mb-3">
        <div class="row">
            @foreach ($chapitres as $item)
                <div class="col-sm-4 text-center">
                    <div class="card m-2 bg-light" style="border-radius: 30px 30px 30px 30px ;">
                        <div class="card-body">
                            <p class="card-text">{{$item->description}}</p>
                            <a href="{{asset('storage/'.$item->file)}}"  class="">file</a>
{{--                            add deltials edit and delete links--}}
                            <div class="btn-group" role="group" aria-label="Basic example">

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#edite{{$item->id}}">
                                    edit
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="edite{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="{{url('/formateur/formations/create/update/'.$item->id.'/chapitre')}}" method="POST" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5>edite Part</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="description" class="form-label">Description</label>
                                                        <textarea type="text" class="form-control" name="description">{{$item->description}}</textarea>
                                                    </div>
                                                    <div class="from-group">
                                                        <label for="photo" >file</label>
                                                        <input  class="form-control" type="file" name="photo">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary" value="save">Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <form action="{{('/formateur/formations/'.$item->id.'/deleteChapitre')}} " method="POST">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                     <button type="submit" class="btn btn-danger ">Delete</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newparte">
            New Part
        </button>

        <!-- Modal -->
        <div class="modal fade" id="newparte" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{url('/formateur/formations/create/store/'.$cour->formation->id.'/chapitre')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>Creat new Part</h5>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea type="text" class="form-control" name="description">{{old('description')}}</textarea>
                            </div>
                            <div class="from-group">
                                <label for="" > file</label>
                                <input  class="form-control" type="file" name="photo">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" value="save">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
