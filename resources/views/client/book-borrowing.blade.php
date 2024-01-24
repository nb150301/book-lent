@extends('layouts.client')

@section('client')
    <div class="justify-content-center d-flex gap-5">
        <div class="card" style="width: 18rem;">
            <img height="200px" src="{{ $book->getFirstMediaUrl() }}" class="card-img-top object-fit-cover" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $book->name }}</h5>
                <p class="card-text">Author: {{ $book->author->name }}</p>
                <p class="card-text">Category: {{ $book->bookCategory->name }}</p>
                <p class="card-text">Quantity: {{ $book->currentQuantity }}</p>
                <a href="{{ route('client.borrowing', $book->id) }}" class="btn btn-primary">Borrowing Now</a>
            </div>
        </div>
        <div class="card">
            <h4 class="card-title pt-2 d-flex justify-content-center">Book Borrowing Form</h4>
            <div class="card-body">
                <form action="{{ route('client.borrowing', $book->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Number of borrowing day:</label>
                        <p class="text-muted">The maximum borrowing period is 30 days.</p>
                        <input type="number" required class="form-control" id="name" name="return_days">
                        @if ($errors->has('return_days'))
                            <span class="text-danger">{{ $errors->first('return_days') }}</span>
                        @endif

                        @if ($errors->has('cant_borrow'))
                            <span class="text-danger">{{ $errors->first('cant_borrow') }}</span>
                        @endif
                    </div>

                    <button class="btn btn-info">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
