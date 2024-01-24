<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BorrowingHistoryController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $borrowHistories = $user->borrowingHistories;

        return view('client.borrowing-history', compact('borrowHistories'));
    }
}
