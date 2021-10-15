@extends('layouts.main')
@section('content')
    <div class="row justify-content-around mt-5">
        @foreach ($comics as $comic)
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop-{{ $comic->id }}" data-bs-backdrop="static"
                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">WARNING! THIS ACTION IS IRREVERSIBLE</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete the comic "{{ $comic->title }}" permanently from the database?
                            You will not be able to restore it again.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <form class="delete-form" method="POST" action="{{ route('comics.perdel', $comic->id) }}">
                                @method('DELETE')
                                @csrf
                                <button class="btn rounded bg-danger text-white" type="submit">Delete permanently</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card pt-3" style="width: 18rem;">
                <img src="{{ $comic->thumb }}" class="card-img-top" alt="{{ $comic->title }}-image">
                <div class="card-body">
                    <h5 class="card-title">{{ $comic->title }}</h5>
                    <div class="d-flex justify-content-center">
                        <div class="d-inline-block">
                            <form method="POST" action="{{ route('comics.restore', $comic->id) }}">
                                @method('PATCH')
                                @csrf
                                <button class="btn rounded bg-success text-white" type="submit">Restore</button>
                            </form>
                        </div>
                        <div class="d-inline-block ms-2">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop-{{ $comic->id }}">
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script>
        /*         const form = document.querySelectorAll('.delete-form');
                                                                                                                                                        form.addeventListener('submit', (e) => {
                                                                                                                                                            e.preventDefault();

                                                                                                                                                        }); */
    </script>
@endsection
