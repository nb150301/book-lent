@extends('layouts.admin')

@section('admin')
    <div class="card-body">
        <form action="{{ route('authors.update', $author->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Author name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $author->name }}">
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
