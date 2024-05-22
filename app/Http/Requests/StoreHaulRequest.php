<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHaulRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'fisherman_id' => 'required|exists:fishermen,id',
            'fish_id' => 'required|exists:fish,id',
            'fishery_id' => 'required|exists:fisheries,id',
            'data' => 'required|date',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
