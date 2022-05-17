@extends('layout')
@section('content')
<div class="col-lg-8"><form action="{{url('formateur/updateprofile')}}" method="post">
    <input type="hidden" value="{{$id}}" name="id">
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Full Name</p>
                </div>
                <div class="col-sm-9">
                  <input type="text" name="name">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                    <input type="text" name="email">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Specialty</p>
                </div>
                <div class="col-sm-9">
                    <input type="text" name="specialite">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Biography</p>
                </div>
                <div class="col-sm-9">
                    <input type="text" name="biography">
                </div>
            </div>
        </div>

  <button type="submit" class="btn btn-outline-primary ms-1"> save</button> </div></form>

</div>
@endsection
