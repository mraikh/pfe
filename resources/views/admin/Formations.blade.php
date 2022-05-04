<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>la liste des Formations</title>
</head>
<body>
    @foreach ($Formations as $iteam )
    <h3>{{$iteam->intitule}} </h3>
    <h3>{{$iteam->description}} </h3>

     @foreach ($iteam->cour as $va )
     <h3>{{$va->intitule}} </h3>
     <h3>{{$va->description}} </h3>
     <h1>___________</h1>

    @endforeach
    <form action="{{url('admin/deleteformation/'.$iteam->id)}}" method="get">
        {{csrf_field()}}
         {{-- {{method_field('DELETE')}} --}}
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    @endforeach

</body>
</html>
