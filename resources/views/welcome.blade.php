@extends('layout')
@section('content')
    <div class="bd-masthead mb-3 pt-5" id="content">
        <div class="container px-4 px-md-3">
            <div class="row align-items-lg-center">
                <div class="col-8 mx-auto col-md-4 order-md-2 col-lg-5">
                    <img src="{{asset('img/homeimg.jpeg')}}" alt="" class="img-fluid mb-3 mb-md-0">
                </div>
                <div class="col-md-8 order-md-1 col-lg-7 text-center text-md-start">
                    <h1 class="mb-3">Welcome to Key Academy best E-learning web site</h1>
                    <p class="lead mb-4">
                        We’re a nonprofit with the mission to provide a free, world-class education for anyone, anywhere.
                    </p>

                    <div class="d-flex flex-column flex-md-row">
                        <a href="/register" class="btn btn-lg btn-primary mb-3 me-md-3">Get started</a>
                        <a href="/login" class="btn btn-lg btn-outline-secondary mb-3">Sign In</a>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
