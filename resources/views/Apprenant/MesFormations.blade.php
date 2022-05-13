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
            <div class="col-sm-4 text-center">
                <div class="card m-2">
                    <div class="card-header">
                        <h5 class="card-title">{{$item->formation->intitule}}</h5>
                        <small class="card-text"> teacher name :{{$item->formation->formateur->name}}</small>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{$item->formation->description}}</p>
                        @foreach ($item->formation->cour as $va )
                            <p class="card-text">{{$va->intitule}}</p>
                            <p class="card-text">{{Auth::user()->Apprenant->avancement->Count('cour_id',$va->id)/$va->chapitre->Count()*100}}%</p>
                            @foreach ($va->chapitre as $sva)
                                <tr>
                                    <td>{{$sva->description}} </td>
                                    <a href="{{asset('storage/'.$sva->file)}}"  class="">pdf chapitre</a>
                                    <form action="{{url('/apprenant/avancement')}}" method="POST">
                                        {{csrf_field()}}
                                        <input type="hidden" value="{{$sva->id}} "name="id">
                                        <input type="hidden" value="{{$sva->cour->id}} "name="id_cour">
                                        <button type="submit" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 30px 30px 30px 30px;">Done</button>
                                    </form>
                                    <br>
                                </tr>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
