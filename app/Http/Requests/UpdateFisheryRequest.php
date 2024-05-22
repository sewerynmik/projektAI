<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFisheryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|unique:fish,name,' . $this->fishery->id,
            'voivodeship' => 'required|string',
            'parish' => 'required|string',
            'locality' => 'required|string',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
