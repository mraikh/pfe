<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>la liste des formateurs</title>
</head>
<body>
    @foreach ($formateurs as $iteam )
    <h3>{{$iteam->name}} </h3>
    <h3>{{$iteam->User->email}} </h3>
    <h3>{{$iteam->specialite}} </h3>
    <h3>{{$iteam->biography}} </h3>
     @foreach ($iteam->formation as $va )
    <h3>{{$va->intitule}} </h3>

    @endforeach
    <form action="{{url('admin/deleteFormateur/'.$iteam->id)}}" method="get">
        {{csrf_field()}}
         {{-- {{method_field('DELETE')}} --}}
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    @endforeach

</body>
</html>
