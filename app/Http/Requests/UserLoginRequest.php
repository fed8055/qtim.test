<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->attempt([
            $this->get('email'),
            $this->get('password')
        ]);
    }

    public function rules(): array
    {
        return [
            'email' => 'required|exists:users:email',
            'password' => 'required|string'
        ];
    }
}
