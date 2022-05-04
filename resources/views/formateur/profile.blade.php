<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
 <h1>{{$formateur->name}} </h1>
 <h1>{{$formateur->id}} </h1>
 <h1>{{$formateur->user_id}} </h1>
 <br>
@foreach ($formateur->formation as $iteam )
<h3> {{$iteam->intitule}} </h3>
@foreach ( $iteam->cour as $va )
<h3> {{$va->intitule}} </h3>
@endforeach

@endforeach
</body>
</html>
