@extends('layouts.admin')

@section('admin')
    <div class="card-body">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($authors as $author)
                <tr>
                    <th scope="row">{{ $loop->index }}</th>
                    <td>
                        <a href="{{ route('authors.edit', $author->id) }}">
                            {{ $author->name }}
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('authors.destroy', $author->id) }}" method="POST">
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
            <a class="text-white text-decoration-none" href="{{ route('authors.create') }}">Create new</a>
        </button>
    </div>
@endsection
