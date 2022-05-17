@extends('layout')
@section('content')
    <div class="container">
        <a href="/apprenant" class="btn primary-btn bg-primary">
            <i class="bi bi-arrow-left text-white"></i>
        </a>
    </div>
<section style="">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                             class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-3">{{$apprenant->name}}</h5>
{{--                        <p class="text-muted mb-1">{{$apprenant->specialite}}</p>--}}
                        <p class="text-muted mb-4">{{$apprenant->niveau_etu}}</p>
                        <div class="d-flex justify-content-center mb-2">
                            <button type="button" class="btn btn-primary">Follow</button>
                            <button type="button" class="btn btn-outline-primary ms-1">Message</button>
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
                                <p class="text-muted mb-0">{{$apprenant->name}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{$apprenant->user->email}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Establishment</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{$apprenant->ecole}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Grade</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{$apprenant->niveau_etu}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    {{--les formation--}}
{{--                    @foreach ($apprenant->formation as $iteam )--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="card mb-4 mb-md-0">--}}
{{--                                <div class="card-body">--}}
{{--                                    <p class="mb-4 text-center"><span class="text-primary font-italic me-1">Tutorial:</span> {{$iteam->intitule}}--}}
{{--                                    </p>--}}
{{--                                    <ul>--}}
{{--                                        <li>--}}
{{--                                            @foreach ( $apprenant->cour as $va )--}}
{{--                                                <p class="mb-1">{{$va->intitule}}</p>--}}
{{--                                            @endforeach--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection