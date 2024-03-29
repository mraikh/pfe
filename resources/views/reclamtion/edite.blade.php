@extends('layout')
@section('content')
    <div class="container m-5 ">
        <div class="row justify-content-center">
            <div class="w-25 ">
                <div class="card bg-light">
                    <div class="card-header text-center">
                        <h5>update reclamation</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{('/formateur/reclamationUpdate/'.$reclamtion->id)}}" method="POST">
                            {{csrf_field()}}

                            <div class="mb-3">
                                <label for="sujet" class="form-label">sujet</label>
                                <textarea type="text" class="form-control" name="sujet">{{old('sujet')}}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary" value="save">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
