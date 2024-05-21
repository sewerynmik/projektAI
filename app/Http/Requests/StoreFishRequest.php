<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Psy\Readline\Hoa\Console;

class StoreFishRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:fish,name',
            'species' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|string',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
