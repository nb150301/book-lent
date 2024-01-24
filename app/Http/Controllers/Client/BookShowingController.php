<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Services\BookBorrowingService;
use Illuminate\Http\Request;

class BookShowingController extends Controller
{
    public function index()
    {
        $books = Book::with('author', 'bookCategory')->get();

        return view('client.books', compact('books'));
    }

    public function show(int $id)
    {
        $book = Book::find($id);
        $numberOfBookCurrently = BookBorrowingService::countNumberOfBook($book);
        $book['currentQuantity'] = $numberOfBookCurrently;
        return view('client.book-borrowing', compact('book'));
    }
}
