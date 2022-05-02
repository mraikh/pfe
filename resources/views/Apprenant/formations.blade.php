@extends('layout')
@section('content')
<div class="text-center">
    <h6 class="section-title bg-white mt-4 text-primary px-3">Training list</h6>
</div>
<div class="container mb-3">
    <div class="row">
        @foreach ($formations as $item)
            <div class="col-sm-4 text-center">
                <div class="card m-2">
                    <div class="card-header">
                        <h5 class="card-title">{{$item->intitule}}</h5>
                        <p class="card-text"> teacher name :{{$item->formateur->name}}</p>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{$item->description}}</p>
                        @foreach ($item->cour as $va )
                        <p class="card-text">{{$va->intitule}}</p>
                        @endforeach
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <form action="{{url('/apprenant/inscription')}}" method="POST">
                                {{csrf_field()}}
                                <input type="hidden" value="{{$item->id}} "name="id">
                                <button type="submit" class="btn btn-light">inscri dans la formation</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>

@endsection
