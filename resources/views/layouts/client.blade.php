@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="container-fluid">
                            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                                <p class="mb-0"><a href="{{ route('client.books') }}" class="navbar-brand">Books</a></p>
                                <p class="mb-0"><a href="{{ route('client.borrowing-history') }}" class="navbar-brand">My borrowing history</a></p>
                            </nav>
                        </div>
                    </div>

                    @yield('client')
                </div>
            </div>
        </div>
    </div>
@endsection
