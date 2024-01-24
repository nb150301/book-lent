<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookCategoryRequest;
use App\Models\BookCategory;

class BookCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookCategories = BookCategory::all();
        return view('admin.book-categories.index', compact('bookCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.book-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookCategoryRequest $request)
    {
        $data = $request->validated();
        BookCategory::create($data);
        return redirect()->route('book-categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(BookCategory $bookCategory)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookCategory $bookCategory)
    {
        return view('admin.book-categories.show', compact('bookCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookCategoryRequest $request, BookCategory $bookCategory)
    {
        $data = $request->validated();
        $bookCategory->update($data);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        BookCategory::destroy($id);
        return redirect()->back();
    }
}
