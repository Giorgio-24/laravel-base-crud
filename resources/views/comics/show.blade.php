@extends('layouts.main')
@section('content')

  <div class="card my-5">
    <div class="row g-0">
      <div class="col-md-4 ">
        <div class="h-100 d-flex"><img src="{{$comic->thumb}}" class="img-fluid rounded-start" alt="{{$comic->title}}-image"></div>
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title"><strong>Title: </strong>{{$comic->title}}</h5>
          <p class="card-text"><strong>Serie:</strong> {{$comic->serie}}</p>
          <p class="card-text"><strong>Type:</strong> {{$comic->type}}</p>
          <p class="card-text"><strong>Sale date:</strong> {{$comic->sale_date}}</p>
          <p class="card-text"><strong>Description:</strong> {{$comic->description}}</p>
          <p class="card-text"><strong>Price:</strong> {{$comic->price}}&euro;</p>
          
          <a href="{{url()->previous()}}" class="btn btn-primary">Go back</a>
        </div>
      </div>
    </div>
  </div>
@endsection