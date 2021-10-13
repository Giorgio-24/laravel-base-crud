@extends('layouts.main')
@section('content')
@foreach ($comics as $comic)
<div><a href="comics/{{$loop->index}}">{{$comic->title}}</a></div>
@endforeach
@endsection