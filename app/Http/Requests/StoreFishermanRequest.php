<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFishermanRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'surname' => 'required|string',
            'age' => 'required|numeric|digits_between:1,3',
            'phone_number' => 'required|numeric|digits:9|unique:fishermen,phone_number,',
            'pesel' => 'required|numeric|digits:9|unique:fishermen,pesel,',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
