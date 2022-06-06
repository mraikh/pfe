@extends('layout')
@section('content')
    <div class="container">
        <a href="/formateur/formations/{{$cour->formation->id}}/view" class="btn primary-btn bg-primary">
            <i class="bi bi-arrow-left text-white"></i>
        </a>
    </div>
    <div class="text-center">
        <h6 class="section-title bg-white mt-4 text-primary px-3">{{$cour->intitule}} course</h6>
    </div>
    <div class="container">
        <p>{{$cour->description}}</p>
    </div>
    <div class="container mb-3">
        <div class="row">
            @foreach ($chapitres as $item)
                <div class="col-sm-4 text-center">
                    <div class="card m-2">
                        <div class="card-body">
                            <p class="card-text">{{$item->description}}</p>
                            <a href="{{asset('storage/'.$item->file)}}"  class="">file</a>
{{--                            add deltials edit and delete links--}}
                            <div class="btn-group" role="group" aria-label="Basic example">

                                <a href="{{('/formateur/formations/Cours/'.$item->id.'/editeChapitre')}} "  class="">
                                    <button type="button" class="btn btn-light">edit</button>
                                </a>
                                <form action="{{('/formateur/formations/'.$item->id.'/deleteChapitre')}} " method="POST">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                     <button type="submit" class="btn btn-danger ">Delete</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
        <form method="get" action="{{('/formateur/formations/CreateChapitre/'.$cour->id)}} ">
            <a href="{{('/formateur/formations/CreateChapitre/'.$cour->id)}} "  class="btn btn-primary">New Chpitres</a>
        </form>
    </div>
@endsection
