@extends('layouts.main')
@section('content')
<div class="row justify-content-around mt-5">
    @foreach ($comics as $comic)
<div class="card pt-3" style="width: 18rem;">
    <img src="{{$comic->thumb}}" class="card-img-top" alt="{{$comic->title}}-image">
    <div class="card-body">
      <h5 class="card-title">{{$comic->title}}</h5>
 {{--        <p class="card-text">{{$comic->description}}</p> --}}
{{--       <a href="{{route('comics.show', $comic->id)}}" class="btn btn-primary">Go</a> --}}
 {{--      <a href="{{route('comics.edit', $comic->id)}}" class="btn btn-secondary">Edit</a> --}}
      <div class="d-inline-block">
            <form method="POST" action="{{route('comics.restore', $comic->id)}}">
                @method('PATCH')
                @csrf
            <button class="btn rounded bg-success text-white" type="submit">Ripristina</button>
            </form>
      </div> 
    </div>
  </div>
@endforeach
</div>
@endsection