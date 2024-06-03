<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFishermanRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'surname' => 'required|string',
            'age' => 'required|numeric|digits_between:1,3',
            'phone_number' => 'required|numeric|digits:9|unique:fishermen,phone_number,' . $this->fisherman->id,
            'pesel' => 'required|numeric|digits:11|unique:fishermen,pesel,'.$this->fisherman->id,
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
