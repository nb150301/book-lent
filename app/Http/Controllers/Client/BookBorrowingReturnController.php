<?php

namespace App\Http\Controllers\Client;

use App\Enums\BorrowingStatus;
use App\Http\Controllers\Controller;
use App\Models\BorrowHistory;
use Carbon\Carbon;

class BookBorrowingReturnController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(int $id)
    {
        $borrowingHistory = BorrowHistory::find($id);

        $borrowingHistory->update([
            'status' => BorrowingStatus::RETURNED,
            'return_acquired_at' => Carbon::now(),
        ]);

        return redirect()->back();
    }
}
