<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
@foreach($comic as $element)
<br>
<div>{{$element->title}}</div>
<div>{{$element->price}}$</div>
<div>{{$element->series}}</div>
<div>{{$element->type}}</div>

@endforeach
</body>
</html>