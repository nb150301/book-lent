<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('books');
});

Route::get('/books', [\App\Http\Controllers\Client\BookShowingController::class, 'index'])->name('client.books');

\Illuminate\Support\Facades\Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/books/{id}/book-borrowing', [\App\Http\Controllers\Client\BookShowingController::class, 'show'])->name('client.book');
    Route::get('/borrowing-histories', [\App\Http\Controllers\Client\BorrowingHistoryController::class, 'index'])->name('client.borrowing-history');
    Route::post('/books/{id}/book-borrowing/return', \App\Http\Controllers\Client\BookBorrowingReturnController::class)->name('book-borrowing.return');


    Route::post('/books/{id}/book-borrowing', \App\Http\Controllers\Client\BookBorrowingRequestController::class)->name('client.borrowing');
    Route::group(['prefix' => 'admin', 'middleware' => 'isAdmin'], function () {
        Route::resources([
            'books' => \App\Http\Controllers\Admin\BookController::class,
            'authors' => \App\Http\Controllers\Admin\AuthorController::class,
            'book-categories' => \App\Http\Controllers\Admin\BookCategoryController::class,
            'borrow-histories' => \App\Http\Controllers\Admin\BorrowHistoryController::class,
            'users' => \App\Http\Controllers\Admin\UserController::class,
        ]);

        Route::post('/books/{id}/book-borrowing/approve', \App\Http\Controllers\Admin\BookBorrowingApproveController::class)->name('book-borrowing.approve');
    });
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
