<?php

namespace App\Http\Requests;

use App\Dto\UserRegistrationDto;
use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ];
    }

    public function toDto(): UserRegistrationDto
    {
        return new UserRegistrationDto(
            name: $this->get('name'),
            email: $this->get('email'),
            password: $this->get('password')
        );
    }
}
