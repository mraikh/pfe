@extends('layout')
@section('content')
<div class="text-center">
    <h6 class="section-title bg-white mt-4 text-primary px-3">reclamation list</h6>
</div>
<<div class="container">
    <a href="/apprenant" class="btn primary-btn bg-primary">
        <i class="bi bi-arrow-left text-white"></i>
    </a>
</div>
<div class="container mb-3">
    <div class="row">
        @foreach ($reclamations as $item)
            <div class="col-sm-4 ">
                <div class="card m-2 " >
                    <div class="card-body">
                        <form action="{{('reclamation/'.$item->id.'/delete')}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button type="submit" class="btn-close" aria-label="Close"></button>
                        </form>
                        <ul class="list-group">
                            <li class="list-group-item">reclamation:{{$item->sujet}}</li>
                            @if ($item->rep_reclamation)
                                <li class="list-group-item">admin answer:{{$item->rep_reclamation}}</li>
                            @endif
                        </ul>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->id}}">edit</button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="{{route('reclamationUpdate')}}" method="POST">
                                        {{csrf_field()}}
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="text-primary">update reclamation</h3>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" value="{{$item->id}} "name="id">
                                                <div class="mb-3">
                                                    <label for="sujet" class="form-label">sujet</label>
                                                    <textarea type="text" class="form-control" name="sujet" value="{{$item->sujet}}" required>{{$item->sujet}}</textarea>
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
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newrec">
        New reclamation
    </button>

    <!-- Modal -->
    <div class="modal fade" id="newrec" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{route('reclamationStore')}}" method="POST">
                {{csrf_field()}}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Creat new reclamation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="sujet" class="form-label">subject</label>
                            <textarea type="text" class="form-control" name="sujet">{{old('sujet')}}</textarea>
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
