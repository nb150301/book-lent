<?php

namespace App\Http\Controllers\Admin;

use App\Enums\BorrowingStatus;
use App\Http\Controllers\Controller;
use App\Models\BorrowHistory;
use App\Services\BookBorrowingService;
use Carbon\Carbon;

class BookBorrowingApproveController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(int $id)
    {
        $borrowingHistory = BorrowHistory::find($id);

        if (BookBorrowingService::checkAvailableToApproveBorrowing($borrowingHistory)) {
            $currentTimestamp = Carbon::now();
            $returnTimestamp = $currentTimestamp->addDays($borrowingHistory->return_day);
            $borrowingHistory->update([
                'status' => BorrowingStatus::APPROVED,
                'borrowed_at' => $currentTimestamp,
                'returned_at' => $returnTimestamp,
            ]);
        } else {
            return redirect()->back()->withErrors(['cant_approve' => 'You cant approve this request']);
        }

        return redirect()->back();
    }
}
