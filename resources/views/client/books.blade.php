@extends('layouts.client')

@section('client')
    <div class="justify-content-center d-flex flex-wrap gap-5">
        @foreach($books as $book)
            <div class="card" style="width: 15rem;">
                <img height="200px" src="{{ $book->getFirstMediaUrl() }}" class="card-img-top object-fit-cover" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $book->name }}</h5>
                    <p class="card-text">Author: {{ $book->author->name }}</p>
                    <p class="card-text">Category: {{ $book->bookCategory->name }}</p>
                    <a href="{{ route('client.book', $book->id) }}" class="btn btn-primary">Borrowing Now</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
