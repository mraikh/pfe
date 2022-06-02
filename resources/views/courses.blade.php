@extends('layout')
@section('content')
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
            <h6 class="section-title bg-white text-center text-primary px-3">Courses </h6>
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
@endsection
