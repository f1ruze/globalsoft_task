<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'    => ['required', 'string', 'max:255'],
            'version' => ['required', 'string', 'max:255'],
            'status'  => ['required', 'boolean']
        ];
    }
}
