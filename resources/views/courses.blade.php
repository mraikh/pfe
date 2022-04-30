@extends('layout')
@section('content')
    <div class="text-center">
        <h6 class="section-title bg-white mt-4 text-primary px-3">Courses</h6>
    </div>
<div class="container mb-3">
    <div class="row">
        @foreach ($cours as $item)
            <div class="col-sm-4 text-center">
                <div class="card m-2">
                    <div class="card-header">
                        <h5 class="card-title">{{$item->intitule}}</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{$item->description}}</p>
                    </div>
                    <div class="card-footer text-muted">
                        {{$item->duree}}h
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@foreach ($cours as $item)

    @endforeach
@endsection
