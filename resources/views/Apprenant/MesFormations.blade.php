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

<div class="container mb-3">
    <div class="row">
        @foreach ($inscriptions as $item)
            <div class="col-sm-6 text-center">
                <div class="card m-2">
                    <div class="card-header">
                        <h5 class="card-title">{{$item->formation->intitule}}</h5>
                        <small class="card-text"> teacher name :{{$item->formation->formateur->name}}</small>
                    </div>
                    <div class="card-body">
                        <div class="accordion " id="accordionFlushExample">

                            <p class="card-text">{{$item->formation->description}}</p>
                            @foreach ($item->formation->cour as $va )
                                <?php $i=0;?>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="{{$va->intitule."h"}}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{$va->intitule}}" aria-expanded="false" aria-controls="{{$va->description}}">
                                            {{$va->intitule}}{{--<small class="card-text">{{Auth::user()->Apprenant->avancement->Count('cour_id',$va->id)/$va->chapitre->Count()*100}}%</small>--}}
                                        </button>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: {{Auth::user()->Apprenant->avancement->Count('cour_id',$va->id)/$va->chapitre->Count()*100}}%"></div>
                                        </div>
                                    </h2>
{{--                                <p class="card-text">{{$va->intitule}}</p>--}}
{{--                                <p class="card-text">{{Auth::user()->Apprenant->avancement->Count('cour_id',$va->id)/$va->chapitre->Count()*100}}%</p>--}}
                                    <div id="{{$va->intitule}}" class="accordion-collapse collapse" aria-labelledby="{{$va->intitule."h"}}" data-bs-parent="#accordionFlushExample">
                                        @foreach ($va->chapitre as $sva)
                                                <div class="accordion-body">
                                                    <small>description:{{$sva->description}}</small><br>
                                                    <a href="{{asset('storage/'.$sva->file)}}"  class="">part <?php $i++; echo $i;?></a>
                                                    <form action="{{url('/apprenant/avancement')}}" method="POST">
                                                        {{csrf_field()}}
                                                        <input type="hidden" value="{{$sva->id}} "name="id">
                                                        <input type="hidden" value="{{$sva->cour->id}} "name="id_cour">
                                                        <button type="submit" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 30px 30px 30px 30px;">Done</button>
                                                    </form>
                                                </div>

{{--                                            <tr>--}}
{{--    --}}{{--                                        <td>{{$sva->description}} </td>--}}
{{--    --}}{{--                                        <a href="{{asset('storage/'.$sva->file)}}"  class="">pdf chapitre</a>--}}
{{--    --}}{{--                                        <form action="{{url('/apprenant/avancement')}}" method="POST">--}}
{{--    --}}{{--                                            {{csrf_field()}}--}}
{{--    --}}{{--                                            <input type="hidden" value="{{$sva->id}} "name="id">--}}
{{--    --}}{{--                                            <input type="hidden" value="{{$sva->cour->id}} "name="id_cour">--}}
{{--    --}}{{--                                            <button type="submit" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 30px 30px 30px 30px;">Done</button>--}}
{{--    --}}{{--                                        </form>--}}
{{--    --}}{{--                                        <br>--}}
{{--                                             </tr>--}}
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
