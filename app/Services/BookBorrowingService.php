<?php

namespace App\Services;

use App\Models\Book;
use App\Models\BorrowHistory;
use App\Models\User;

class BookBorrowingService
{
    static public function checkAvailableToBorrowNewBook(User $user, Book $book) {
        $numberOfBookCurrently = self::countNumberOfBook($book);

        if ($numberOfBookCurrently < 1) {
            return false;
        }

        // Giả sử chỉ giới hạn cho 1 người mượn 5 cuốn (Có thể thêm cột available cho User nếu cần)
        if ($user->borrowingBooksDidNotReturn->count() > 5) {
            return false;
        }

        $orderingBooks = $user->orderingBook;
        foreach ($orderingBooks as $bookBorrowing) {
            if ($bookBorrowing->id == $book->id) {
                return false;
            }
        }

        return true;
    }

    static public function checkAvailableToApproveBorrowing(BorrowHistory $borrowHistory) {
        $user = $borrowHistory->user;
        $book = $borrowHistory->book;

        $numberOfBookCurrently = self::countNumberOfBook($book);

        if ($numberOfBookCurrently < 1) {
            return false;
        }

        if ($user->borrowingBooksDidNotReturn->count() > 5) {
            return false;
        }

        return true;
    }

    static public function countNumberOfBook(Book $book) {
        return $book->quantity -  $book->borrowingBooksDidNotReturn()->count();
    }
}
