@extends('layout')
@section('content')
<div class="text-center">
    <h6 class="section-title bg-white mt-4 text-primary px-3">reclamation list</h6>
</div>
<<div class="container">
    <a href="/apprenant" class="btn primary-btn bg-primary">
        <i class="bi bi-arrow-left text-white"></i>
    </a>
</div>
<div class="container mb-3">
    <div class="row">
        @foreach ($reclamations as $item)
            <div class="col-sm-4 text-center">
                <div class="card m-2">
                    <div class="card-body">
                        <h5 class="card-title">{{$item->sujet}}</h5>
                    </div>
                    <div class="card-body">
                       @if ($item->rep_reclamation)
                       la reponse de admin:
                        <p class="card-text"  >{{$item->rep_reclamation}}</p>
                         @endif
                         <div class="btn-group" role="group" aria-label="Basic example">
                            {{-- <a href="{{('formations/'.$item->id.'/view')}}" class="">
                                <button type="button" class="btn btn-primary">detials</button>
                            </a> --}}
                            <a href="{{('reclamtions/'.$item->id.'/edit')}}" class="">
                                <button type="button" class="btn btn-light">edit</button>
                            </a>
                            <form action="{{('reclamation/'.$item->id.'/delete')}}" method="POST">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <form method="get" action="{{ route('reclamationCreate') }}">
        <a href="{{ route('reclamationCreate') }}" class="btn btn-primary">New reclamation</a>
    </form>
</div>

@endsection
