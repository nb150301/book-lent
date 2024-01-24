<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BorrowingBookRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'return_days' => 'required|integer|gt:0|lt:31',
        ];
    }
}
