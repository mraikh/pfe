@extends('layout')
@section('content')
    <div class="bd-masthead mb-3 p-5" id="content">
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

{{--cours--}}
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
            <h6 class="section-title bg-white text-center text-primary px-3">Our courses</h6>
        </div>
        <div class="row g-4 justify-content-center">
            <?php $j=0;?>
            @foreach ($cours as $item)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="{{asset('img/'.++$j.'.png')}}" alt="">
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                <a href="/apprenant/formations" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 30px 30px 30px 30px ;">Start now</a>
                            </div>
                        </div>
                        <div class="text-center p-4 pb-0">
                            <h5 class="mb-4">{{$item->intitule}}</h5>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>{{$item->formation->formateur->name}}</small>
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>{{$item->duree}}Hrs</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>{{$item->formation->inscription->Count()}} Students</small>
                        </div>
                    </div>
                </div>
                <?php if($j==9)$j=0;?>
            @endforeach
        </div>
    </div>
    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="{{asset('img/aboutimg.jpeg')}}" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6>
                    <h1 class="mb-4">Welcome to Key Academy</h1>
                    <p class="mb-4">Whether you want to learn or to share what you know, you’ve come to the right place. As a global destination for online learning, we connect people through knowledge.</p>
                    <p class="mb-4">Whatever your learning style, we have a course that fits. Coming from instructors all over the world, our courses cover just about anything you’d want to know.</p>
                    <div class="row gy-2 gx-4 mb-4">
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Skilled Instructors</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Online Classes</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>International Certificate</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Skilled Instructors</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Online Classes</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>International Certificate</p>
                        </div>
                    </div>
                    <a class="btn btn-primary py-3 px-5 mt-2" href="/contact">Contact us</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
@endsection
