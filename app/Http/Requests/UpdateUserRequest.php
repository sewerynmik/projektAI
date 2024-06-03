<?php

namespace App\Http\Requests;

use App\Models\Fisherman;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|unique:users,name,' . $this->user->id,
            'email' => 'required|string|email|unique:users,email,' . $this->user->id,
            'password' => 'required|string|min:8',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
