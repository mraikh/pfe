@foreach ($formations as $iteam )
{{$iteam->intitule}}
@foreach ($iteam->inscription as $va)
{{$va->Apprenant->name}}
{{$va->Apprenant->User->email}}
<form action={{url('formateur/remove')}}  method="post">
    {{csrf_field()}}
<input type="hidden" value="{{$va->id}} " name="id">
<button type="submit" class="btn btn-primary">delete</button>


</form>
@endforeach

@endforeach
