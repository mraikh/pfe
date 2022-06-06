@extends('layout')
@section('content')
    <div class="container">
        <a href="/formateur/formations" class="btn primary-btn bg-primary">
            <i class="bi bi-arrow-left text-white"></i>
        </a>
    </div>
    <div class="text-center">
        <h6 class="section-title bg-white mt-4 text-primary px-3">{{$formation->intitule}} tutorial</h6>
    </div>
    <div class="container mb-3">
        <div class="row">
            @foreach ($cours as $item)
                <div class="col-sm-4 text-center">
                    <div class="card m-2 bg-light" style="border-radius: 30px 30px 30px 30px ;">

                        <div class="card-body">
                            <h5 class="section-title text-primary">{{$item->intitule}}</h5>
                            <p class="card-text">{{$item->description}}</p>
                            <?php $i=0;?>
                            <ul class="list-group">
                                @foreach ($item->chapitre as $va )
                                    <li class="list-group-item">
                                        <?php $i++; echo "Part $i:"?>
                                        {{$va->description}}
                                    </li>
                                @endforeach
                            </ul>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{('/formateur/formations/'.$item->id.'/view/Cour')}} " class="">
                                    <button type="button" class="btn btn-primary">detials</button>
                                </a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal{{$va->id}}">
                                    Edit
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{$va->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="{{url ('/formateur/formations/cours/'.$item->id.'/update') }}" method="POST">
                                            {{csrf_field()}}
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edite Course</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="training name" class="form-label">cour name</label>
                                                        <input type="text" class="form-control" name="intitule" value="{{$item->intitule}}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="description" class="form-label">Description</label>
                                                        <textarea type="text" class="form-control" name="description">{{$item->description}}</textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="training name" class="form-label">Period in hours </label>
                                                        <input type="number" class="form-control" name='duree' value="{{$item->duree}}">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary" value="save">Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <form action="{{url('/formateur/formations/cours/'.$item->id.'/delete')}}" method="POST">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                     <button type="submit" class="btn btn-danger ">Delete</button>
                                </form>
                            </div>

                        </div>
                        <div class="card-footer text-muted">
                            {{$item->duree}}h
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <form method="get" action="{{'/formateur/formations/Cours/create/'.$formation->id}}">
            <a href="{{'/formateur/formations/Cours/create/'.$formation->id}}" class="btn btn-primary">New course</a>
        </form>
    </div>

@endsection
