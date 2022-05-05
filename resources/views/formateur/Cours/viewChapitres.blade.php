@extends('layout')
@section('content')
    <div class="text-center">
        <h6 class="section-title bg-white mt-4 text-primary px-3">Course List</h6>
    </div>
    <div class="container">
        <h3>Cour: {{$cour->intitule}}</h3>
        <h5>{{$cour->description}}</h5>
    </div>
    <div class="container mb-3">
        <div class="row">
            @foreach ($chapitres as $item)
                <div class="col-sm-4 text-center">
                    <div class="card m-2">
                        <div class="card-body">
                            <p class="card-text">{{$item->description}}</p>
{{--                            add deltials edit and delete links--}}
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="" class="">
                                    <button type="button" class="btn btn-primary">detials</button>
                                </a>
                                <a href=""  class="">
                                    <button type="button" class="btn btn-light">edit</button>
                                </a>
                                <form action="" method="POST">
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
        <form method="get" action=>
            <a href=""  class="btn btn-primary">New Chpitres</a>
        </form>
    </div>
@endsection
