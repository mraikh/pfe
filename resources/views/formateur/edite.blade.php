@extends('layout')
@section('content')
<div class="container m-5 ">
    <div class="row justify-content-center">
        <div class="w-25 ">
            <div class="card bg-light">
                <div class="card-header text-center">
                    <h5>Edite training</h5>
                </div>
                <div class="card-body">
                    <form action="{{ ('/formateur/formations/'.$formation->id.'/update') }}" method="POST">
                        {{csrf_field()}}
                        <div class="mb-3">
                            <label for="training name" class="form-label">Training name</label>
                            <input type="text" class="form-control" name="intitule" value="{{old('intitule')}}">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea type="text" class="form-control" name="description">{{old('description')}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" value="save">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
