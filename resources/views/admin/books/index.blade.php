@extends('layouts.admin')

@section('admin')
    <div class="card-body">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Author</th>
                <th scope="col">Category</th>
                <th scope="col">Image</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
                <tr>
                    <th scope="row">{{ $loop->index }}</th>
                    <td>
                        <a href="{{ route('books.edit', $book->id) }}">
                            {{ $book->name }}
                        </a>
                    </td>
                    <td>{{ $book->author->name }}</td>
                    <td>{{ $book->bookCategory->name }}</td>
                    <td>
                        @if ($image = $book->getFirstMediaUrl())
                            <img height="200px" width="150px" class="img-thumbnail object-fit-cover" src="{{ $image }}" />
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <button type="button" class="btn btn-primary">
            <a class="text-white text-decoration-none" href="{{ route('books.create') }}">Create new</a>
        </button>
    </div>
@endsection
