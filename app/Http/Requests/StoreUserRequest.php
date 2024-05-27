<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_name' => 'required|string|max:255|unique:users,name',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:8',
            'fisherman_name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'age' => 'required|integer',
            'phone_number' => 'required|integer|unique:fishermen,phone_number',
            'pesel' => 'required|string|max:11|min:11|unique:fishermen,pesel',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
