@extends('layout')
@section('content')
<div class="text-center ">
    <h6 class="section-title bg-white mt-4 text-primary px-3">Student Home</h6>
</div>
<div class="align-items-center">
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-6 col-sm-6 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <a href="{{route('formations')}}">
                        <div class="service-item text-center pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                                <h5 class="mb-3">Tutorials</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 col-sm-6 wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                    <a href="{{route('reclamation')}} " class="">
                        <div class="service-item text-center pt-3">
                            <div class="p-4">
                                <i class="bi bi-dash-circle-fill fa-3x text-primary mb-4"></i>
                                <h5 class="mb-3">reclamation</h5>
                            </div>
                        </div></a>
                </div>
                <div class="col-lg-6 col-sm-6 wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                    <a href="{{route('mesFormations')}} " class="">
                        <div class="service-item text-center pt-3">
                            <div class="p-4">
                                <i class="bi bi-card-list fa-3x text-primary mb-4"></i>
                                <h5 class="mb-3">My tutorials</h5>
                            </div>
                        </div></a>
                </div>
                <div class="col-lg-6 col-sm-6 wow fadeInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                    <a href="{{route('profile')}} " class="">
                        <div class="service-item text-center pt-3">
                            <div class="p-4">
                                <i class="bi bi-person-circle fa-3x text-primary mb-4"></i>
                                <h5 class="mb-3">profile</h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
