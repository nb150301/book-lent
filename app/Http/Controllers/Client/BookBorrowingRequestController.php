<?php

namespace App\Http\Controllers\Client;

use App\Enums\BorrowingStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\BorrowingBookRequest;
use App\Models\Book;
use App\Models\BorrowHistory;
use App\Services\BookBorrowingService;
use Illuminate\Support\Facades\Auth;

class BookBorrowingRequestController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(BorrowingBookRequest $request, int $id)
    {
        $book = Book::find($id);
        $user = Auth::user();

        $promiseReturnDays = $request->input('return_days');

        $isAvailableToBorrowNewBook = BookBorrowingService::checkAvailableToBorrowNewBook($user, $book);
        if ($isAvailableToBorrowNewBook) {
            BorrowHistory::create([
                'user_id' => $user->id,
                'book_id' => $book->id,
                'return_day' => $promiseReturnDays,
                'status' => BorrowingStatus::PENDING,
            ]);
        } else {
            return redirect()->back()->withErrors(['cant_borrow' => 'You cant borrowing this book now, choose another one']);
        }

        return redirect()->back();
    }
}
