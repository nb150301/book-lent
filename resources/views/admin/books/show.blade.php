@extends('layouts.admin')

@section('admin')
    <div class="card-body">
        <form action="{{ route('books.update', $book->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Book name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $book->name }}">
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Book category</label>
                <select name="book_category_id">
                    @foreach($categories as $category)
                        <option @if($category->id == $book->category_id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('category_id'))
                    <span class="text-danger">{{ $errors->first('category_id') }}</span>
                @endif
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Book author</label>
                <select name="author_id">
                    @foreach($authors as $author)
                        <option @if($author->id == $book->author_id) selected @endif value="{{ $author->id }}">{{ $author->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('author_id'))
                    <span class="text-danger">{{ $errors->first('author_id') }}</span>
                @endif
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Book quantity</label>
                <input type="number" class="form-control" id="quantity" value="{{ $book->quantity }}">
                @if ($errors->has('quantity'))
                    <span class="text-danger">{{ $errors->first('quantity') }}</span>
                @endif
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Book image</label>
                @if ($image = $book->getFirstMediaUrl())
                    <img src="{{ $image }}" />
                @endif
                <input type="file" name="image" id="image" />
                @if ($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
