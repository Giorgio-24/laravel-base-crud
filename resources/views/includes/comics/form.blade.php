@if ($comic->exists)
    <form method="POST" action="{{ route('comics.update', $comic->id) }}"
        class="border border-3 rounded my-5 p-5 bg-white">
        @method('PATCH')
    @else
        <form method="POST" action="{{ route('comics.store') }}" class="border border-3 rounded my-5 p-5 bg-white">
@endif

@csrf
<div class="row">

    <h3 class="text-center mb-5 h1"><span class="text-capitalize">{{ $string }}</span> your comic</h3>

    <div class="col-6">
        <label for="title" class="form-label"><strong>Title</strong></label>
        <input type="text" value="{{ old('title', $comic->title) }}"
            class="form-control @error('title') is-invalid @enderror" id="title" name="title"
            placeholder="Insert title here">
        @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @else
            <div class="form-text">Insert the title of the comic you want to {{ $string }}.</div>
        @enderror
    </div>

    <div class="col-6">
        <label for="description" class="form-label"><strong>Description</strong></label>
        <input type="text" value="{{ old('description', $comic->description) }}"
            class="form-control @error('title') is-invalid @enderror" id="description" name="description"
            placeholder="Insert description here">
        @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @else
            <div class="form-text">Insert the description of the comic you want to {{ $string }}.</div>
        @enderror
    </div>

    <div class="col-6">
        <label for="thumb" class="form-label"><strong>Thumb</strong></label>
        <input type="text" value="{{ old('thumb', $comic->thumb) }}" class="form-control" id="thumb" name="thumb"
            placeholder="Insert thumb here">
        <div class="form-text">Insert the thumb of the comic you want to {{ $string }}.</div>
    </div>

    <div class="col-6">
        <label for="price" class="form-label"><strong>Price</strong></label>
        <input type="text" value="{{ old('price', $comic->price) }}" class="form-control" id="price" name="price"
            placeholder="Insert price here">
        <div class="form-text">Insert the price in euros of the comic you want to {{ $string }}.</div>
    </div>

    <div class="col-6">
        <label for="series" class="form-label"><strong>Series</strong></label>
        <input type="text" value="{{ old('series', $comic->series) }}" class="form-control" id="series"
            name="series" placeholder="Insert series here">
        <div class="form-text">Insert the series of the comic you want to {{ $string }}.</div>
    </div>

    <div class="col-6">
        <label for="sale_date" class="form-label"><strong>Sale date</strong></label>
        <input type="text" value="{{ old('sale_date', $comic->sale_date) }}" class="form-control" id="sale_date"
            name="sale_date" placeholder="Insert sale_date here">
        <div class="form-text">Insert the sale date of the comic you want to {{ $string }}.</div>
    </div>

    <div class="col-6">
        <label for="type" class="form-label"><strong>Type</strong></label>
        <input type="text" value="{{ old('type', $comic->type) }}" class="form-control" id="type" name="type"
            placeholder="Insert type here">
        <div class="form-text">Insert the type of the comic you want to {{ $string }}.</div>
    </div>
</div>
<button type="submit" class="btn btn-primary mt-4">Submit</button>
</form>
