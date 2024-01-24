<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\BookCategory;
use Illuminate\Support\Arr;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = BookCategory::all();
        $authors = Author::all();
        return view('admin.books.create', compact('categories', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {
        $data = Arr::except($request->validated(), 'image');
        $book = Book::create($data);
        $book->addMediaFromRequest('image')->toMediaCollection();

        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $categories = BookCategory::all();
        $authors = Author::all();
        return view('admin.books.show', compact('book', 'categories', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, Book $book)
    {
        $data = Arr::except($request->validated(), 'image');
        $book->update($data);
        if ($request->has('image')) {
            $collection = $book->getMedia();
            foreach ($collection as $item) {
                $item->delete();
            }
            $book->addMediaFromRequest('image')->toMediaCollection();
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Book::destroy($id);

        return redirect()->back();
    }
}
