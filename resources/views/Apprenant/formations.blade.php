@extends('layout')
@section('content')
<div class="text-center">
    <h6 class="section-title bg-white mt-4 text-primary px-3">tutorials list</h6>
</div>
<div class="container">
    <a href="/apprenant" class="btn primary-btn bg-primary">
        <i class="bi bi-arrow-left text-white"></i>
    </a>
</div>
<div class="container mb-3">
    <div class="row">
        @foreach ($formations as $item)
{{--            <div class="col-sm-4 text-center">--}}
{{--                <div class="card m-2">--}}
{{--                    <div class="card-header">--}}
{{--                        <h5 class="card-title">{{$item->intitule}}</h5>--}}
{{--                        <small class="card-text"> teacher name :{{$item->formateur->name}}</small>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <p class="card-text">{{$item->description}}</p>--}}
{{--                        @foreach ($item->cour as $va )--}}
{{--                        <p class="card-text">{{$va->intitule}}</p>--}}
{{--                        @endforeach--}}
{{--                        <div class="btn-group" role="group" aria-label="Basic example">--}}
{{--                            <form action="{{url('/apprenant/inscription')}}" method="POST">--}}
{{--                                {{csrf_field()}}--}}
{{--                                <input type="hidden" value="{{$item->id}} "name="id">--}}
{{--                                <button type="submit" class="btn btn-light">inscri dans la formation</button>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                <div class="course-item bg-light">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid" src="https://i.pinimg.com/564x/fd/a1/33/fda133479e3360650e5da2a3c3f2ad90.jpg"  alt="">
                        <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                            <form action="{{url('/apprenant/inscription')}}" method="POST">
                                {{csrf_field()}}
                                <input type="hidden" value="{{$item->id}} "name="id">
                                <button type="submit" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 30px 30px 30px 30px;">Register</button>
                            </form>
                        </div>
                    </div>
                    <div class="border-bottom p-2">
                        <h5 class="text-center text-primary">{{$item->intitule}}</h5>
                        <p class="card-text">{{$item->description}}</p>
                    </div>
                    <div class=" p-4 pb-0 mb-4">

                        <h6>courses:</h6>
                        <ul>
                        @foreach ($item->cour as $va )
                            <li class="card-text">{{$va->intitule}}</li>
                        @endforeach
                        </ul>
                    </div>
                    <div class="d-flex border-top">
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>{{$item->formateur->name}}</small>
                        <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>{{$item->inscription->Count()}} Students</small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>

@endsection
