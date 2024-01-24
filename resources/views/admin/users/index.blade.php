@extends('layouts.admin')

@section('admin')
    <div class="card-body">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">User</th>
                <th scope="col">Count Borrowing Book</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $loop->index }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->count_borrowing }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
