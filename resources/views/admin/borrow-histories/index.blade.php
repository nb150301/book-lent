@extends('layouts.admin')

@section('admin')
    <div class="card-body">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Book</th>
                <th scope="col">User</th>
                <th scope="col">Promise return day</th>
                <th scope="col">Borrowed at</th>
                <th scope="col">Promise to return at</th>
                <th scope="col">Return acquired at</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($borrowHistories as $borrowHistory)
                <tr>
                    <th scope="row">{{ $loop->index }}</th>
                    <td>{{ $borrowHistory->book->name }}</td>
                    <td>{{ $borrowHistory->user->name }}</td>
                    <td>{{ $borrowHistory->return_day }}</td>
                    <td>{{ $borrowHistory->borrowed_at ?: "Not yet" }}</td>
                    <td>{{ $borrowHistory->returned_at ?: "Not yet" }}</td>
                    <td>{{ $borrowHistory->return_acquired_at ?: "Not yet" }}</td>
                    <td>
                        @php($status = $borrowHistory->status)
                        @if ($status == \App\Enums\BorrowingStatus::PENDING)
                            <button type="button" class="btn btn-primary">Pending</button>
                        @elseif ($status == \App\Enums\BorrowingStatus::APPROVED)
                            <button type="button" class="btn btn-success">Approved</button>
                        @else
                            <button type="button" class="btn btn-secondary">Returned</button>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('book-borrowing.approve', $borrowHistory->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-warning">Approve</button>
                            @if ($errors->has('cant_borrow'))
                                <span class="text-danger">{{ $errors->first('cant_borrow') }}</span>
                            @endif
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
