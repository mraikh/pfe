@extends('layout')
@section('content')
<div class="col-lg-8">
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Full Name</p>
                </div>
                <div class="col-sm-9">
                  <input type="text" name="">
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
</div>
@endsection
