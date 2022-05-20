@extends('layout')
@section('content')
    <div class="container mb-3">
        <a href="/admin" class="btn primary-btn bg-primary">
            <i class="bi bi-arrow-left text-white"></i>
        </a>
    </div>
<div class="text-center">
    <h6 class="section-title bg-white mt-4 text-primary px-3">Reclamation list</h6>
</div>
<div class="container mb-3">
    <div class="row">
        @foreach ($reclamations as $item)
            <div class="col-sm-4 text-center">
                <div class="card m-2">
                    <div class="card-body">
                        <h5 class="card-title">reclamation about:{{$item->sujet}}</h5>
                        <small>from the {{$item->User->Role->name}} {{$item->User->name}}</small>
                    </div>
                    <div class="card-body">
                        <p class="card-text"  >admin respond: {{$item->rep_reclamation}}</p>
                         <div class="btn-group" role="group" aria-label="Basic example">
                             <a href="{{('reclamtions/'.$item->id.'/edit')}}" class="">
                                <button type="button" class="btn btn-light">Respond</button>
                             </a>
                             <form action="{{route('admin.destroyReclamtion')}}" method="post">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <input type="hidden" value="{{$item->id}} " name="id">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>

@endsection
