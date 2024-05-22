<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFishRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|unique:fish,name,' . $this->fish->id,
            'species' => 'required|string',
            'description' => 'required|string',
            'image' => 'required',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
