@extends('layout')
@section('content')
    <div class="container m-5 ">
        <div class="row justify-content-center">
            <div class="w-25 ">
                <div class="card bg-light">
                    <div class="card-header text-center">
                        <h5>Creat new chapitre</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{url('/formateur/formations/create/store/'.$id.'/chapitre')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea type="text" class="form-control" name="description">{{old('description')}}</textarea>
                            </div>
                            <div class="from-group"><label for="" > pdf</label>
                                <input  class="form-control" type="file" name="photo"></div>

                            <button type="submit" class="btn btn-primary" value="save">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
