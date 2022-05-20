@extends('layout')
@section('content')
<div class="text-center">
    <h6 class="section-title bg-white mt-4 text-primary px-3">Training list</h6>
</div>
<div class="container">
    <a href="/apprenant" class="btn primary-btn bg-primary">
        <i class="bi bi-arrow-left text-white"></i>
    </a>
</div>

    <div class="container">
        <?php $j=0;?>
        @foreach ($inscriptions as $item)

            <div class="p-4 p-md-5 mb-4 text-dark rounded bg-light">
                <div class="row">
                    <div class="col-md-6 px-0">
                        <h1 class="display-4 fst-italic">{{$item->formation->intitule}} tutorial</h1>
                        <p class="lead my-3">
                            description:{{$item->formation->description}}<br>
                            <small class=""> teacher name :{{$item->formation->formateur->name}}</small>
                        </p>
                        <p class="lead mb-0"><a href="#" class="fw-bold">Continue reading...</a></p>
                    </div>
                    <div class="col-lg-6 d-none d-lg-block bg-login-image">
                        <img src="{{asset('img/'.++$j.'.png')}}" class="col-lg-6  d-lg-block" alt="">
                    </div>
                </div>
                <div class="col-md-12 px-0">
                    <div class="accordion " id="accordionFlushExample">
                        <div class="row">
                            @foreach ($item->formation->cour as $va )
                                <?php $i=0;?>
                            <div class="col-lg-6">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="{{$va->intitule."h"}}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{$va->intitule.$item->formation->intitule}}" aria-expanded="false" aria-controls="{{$va->intitule.$item->formation->intitule}}">
                                            {{$va->intitule}}
                                        </button>
                                        @if ($va->chapitre->Count())
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: {{Auth::user()->Apprenant->avancement->where('cour_id',$va->id)->Count()/$va->chapitre->Count()*100}}%">{{Auth::user()->Apprenant->avancement->where('cour_id',$va->id)->Count()/$va->chapitre->Count()*100}}%</div>
                                            </div>
                                        @endif
                                    </h2>
                                    <div id="{{$va->intitule.$item->formation->intitule}}" class="accordion-collapse collapse" aria-labelledby="{{$va->intitule."h"}}" data-bs-parent="#accordionFlushExample">
                                        <div class="row">
                                            <div class="accordion-body ">
                                                <div class="row">
                                                @foreach ($va->chapitre as $sva)
                                                        <div class="card text-center col" style="width: 18rem;">
                                                            <div class="card-body">
                                                                <h5 class="card-title">part <?php $i++; echo $i;?></h5>
                                                                <h6 class="card-subtitle mb-2 text-muted">description:{{$sva->description}}</h6>
                                                                <a href="{{asset('storage/'.$sva->file)}}"  class="">file</a>
                                                                <form action="{{url('/apprenant/avancement')}}" method="POST">
                                                                    {{csrf_field()}}
                                                                    <input type="hidden" value="{{$sva->id}} "name="id">
                                                                    <input type="hidden" value="{{$sva->cour->id}} "name="id_cour">
                                                                    <button type="submit" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 30px 30px 30px 30px;">Done</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
                <?php if($j==9)$j=0;?>
        @endforeach
    </div>
@endsection
