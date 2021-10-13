@extends('layouts.main')
@section('content')
<form method="POST" action="{{route('comics.update', $comic->id)}}" class="border rounded my-5 p-5">
    @method('PATCH')
    @csrf 
    
<div class="row">

<h3 class="text-center mb-5 h1">Edit your comic</h3>

    <div class="col-6">
        <label for="title" class="form-label"><strong>Title</strong></label>
        <input type="text" value="{{$comic->title}}" class="form-control" id="title" name="title" placeholder="Insert title here">
        <div class="form-text">Insert the title of the comic you want to edit.</div>
    </div>

    <div class="col-6">        
        <label for="description" class="form-label"><strong>Description</strong></label>
        <input type="text" value="{{$comic->description}}" class="form-control" id="description" name="description" placeholder="Insert description here">
        <div class="form-text">Insert the description of the comic you want to edit.</div>
    </div>

    <div class="col-6">
        <label for="thumb" class="form-label"><strong>Thumb</strong></label>
        <input type="text" value="{{$comic->thumb}}" class="form-control" id="thumb" name="thumb" placeholder="Insert thumb here">
        <div class="form-text">Insert the thumb of the comic you want to edit.</div>
    </div>

    <div class="col-6">
        <label for="price" class="form-label"><strong>Price</strong></label>
        <input type="text" value="{{$comic->price}}" class="form-control" id="price" name="price" placeholder="Insert price here">
        <div class="form-text">Insert the price in euros of the comic you want to edit.</div>
    </div>

    <div class="col-6">
        <label for="series" class="form-label"><strong>Series</strong></label>
        <input type="text" value="{{$comic->series}}" class="form-control" id="series" name="series" placeholder="Insert series here">
        <div class="form-text">Insert the series of the comic you want to edit.</div>
    </div>

    <div class="col-6">
        <label for="sale_date" class="form-label"><strong>Sale date</strong></label>
        <input type="text" value="{{$comic->sale_date}}" class="form-control" id="sale_date" name="sale_date" placeholder="Insert sale_date here">
        <div class="form-text">Insert the sale date of the comic you want to edit.</div>
    </div>

    <div class="col-6">
        <label for="type" class="form-label"><strong>Type</strong></label>
        <input type="text" value="{{$comic->type}}" class="form-control" id="type" name="type" placeholder="Insert type here">
        <div class="form-text">Insert the type of the comic you want to edit.</div>
    </div>
</div>
<button type="submit" class="btn btn-primary mt-4">Submit</button>
</form>
@endsection