@extends('layouts.main')
@section('content')
<div class="row justify-content-around pb-5">
    @foreach ($comics as $comic)
<div class="card pt-3 mt-5" style="width: 18rem;">
    <img src="{{$comic->thumb}}" class="card-img-top" alt="{{$comic->title}}-image">
    <div class="card-body">
      <h5 class="card-title">{{$comic->title}}</h5>
      <div class="d-flex justify-content-center mt-3">
        <a href="{{route('comics.show', $comic->id)}}" class="btn btn-primary me-2">Go</a>
        <a href="{{route('comics.edit', $comic->id)}}" class="btn btn-secondary me-2">Edit</a>
        <div class="d-inline-block">
              <form method="POST" action="{{route('comics.destroy', $comic->id)}}">
                  @method('DELETE')
                  @csrf
              <button class="btn rounded bg-danger text-white" type="submit">Delete</button>
              </form>
        </div>
      </div>
    </div>
  </div>
@endforeach
</div>
@endsection