<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required',
            'author_id' => 'required',
            'book_category_id' => 'required',
            'quantity' => 'numeric',
            'image' => 'required|image'
        ];
    }
}
