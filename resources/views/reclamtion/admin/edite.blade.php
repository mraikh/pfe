@extends('layout')
@section('content')
    <div class="container m-5 ">
        <div class="row justify-content-center">
            <div class="w-25 ">
                <div class="card bg-light">
                    <div class="card-header text-center">
                        <h5>replay</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.reclamationUpdate')}}" method="POST">
                            {{csrf_field()}}
                            <input type="hidden" value="{{$reclamtion->id}} "name="id">

                            <div class="mb-3">
                                <label for="rep_reclamation" class="form-label">reponse</label>
                                <textarea type="text" class="form-control" name="rep_reclamation">{{old('rep_reclamation')}}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary" value="save">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
