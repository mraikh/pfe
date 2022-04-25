@extends('layout')
@section('content')
<div class="Contrainer">
    <div class="row">
        <div class="Col-md-12">
             <form action={{('/formateur/formations/cours/store/'.$id)}}  method="POST">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="">intitule</label>
                    <input type="text" name='intitule' class="from-control" value="{{old('intitule')}}"></div>

 <div class="form-group  has-error ">
                    <label for="">description</label>
                    <textarea type="text" name='description'class="from-control" > {{old('description')}}</textarea></div>
                </div><div class="form-group  has-error ">
                <label for="">duree</label>  <input type="text" name='duree' class="from-control" value="{{old('duree')}}">
               </div>
            </div> </div>



<div class="form-group">

                    <input type="submit"  class="from-control bnt bnt-primary" value="save"></div>

                 </form>     </div>
    </div>

@endsection
