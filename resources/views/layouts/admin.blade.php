@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="container-fluid">
                            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                                <p class="mb-0"><a href="{{ route('books.index') }}" class="navbar-brand">Books</a></p>
                                <p class="mb-0"><a href="{{ route('authors.index') }}" class="navbar-brand">Authors</a></p>
                                <p class="mb-0"><a href="{{ route('book-categories.index') }}" class="navbar-brand">Book Categories</a></p>
                                <p class="mb-0"><a href="{{ route('borrow-histories.index') }}" class="navbar-brand">Borrow Histories</a></p>
                                <p class="mb-0"><a href="{{ route('users.index') }}" class="navbar-brand">Users</a></p>
                            </nav>
                        </div>
                    </div>

                    @yield('admin')
                </div>
            </div>
        </div>
    </div>
@endsection
