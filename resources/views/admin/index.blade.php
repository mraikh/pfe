@extends('layout')
@section('content')
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-6 col-sm-6 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <a href="{{route('admin.reclamation')}} ">
                        <div class="service-item text-center pt-3">
                            <div class="p-4">
                                <i class="bi bi-exclamation-circle-fill fa-3x text-primary mb-4"></i>
                                <h5 class="mb-3">reclamations list</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 col-sm-6 wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                    <a href="{{route('admin.fourmateurs')}} ">
                        <div class="service-item text-center pt-3">
                            <div class="p-4">
                                    <i class="fa fa-user-tie fa-3x text-primary mb-4"></i>
                                    <h5 class="mb-3">Teachers list</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 col-sm-6 wow fadeInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                    <a href="{{route('admin.Apprenants')}} ">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                                <i class="fa fa-user fa-3x text-primary mb-4"></i>
                            <h5 class="mb-3">Students list</h5>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-6 col-sm-6 wow fadeInUp" data-wow-delay="0.7s" style="visibility: visible; animation-delay: 0.7s; animation-name: fadeInUp;">
                    <a href="{{route('admin.Formations')}} ">
                        <div class="service-item text-center pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-book-open text-primary mb-4"></i>
                                <h5 class="mb-3">Tutorials list</h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
