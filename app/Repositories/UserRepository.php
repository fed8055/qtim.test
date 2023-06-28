<?php

namespace App\Repositories;

use App\Contracts\Repositories\UserRepositoryContract;
use App\Dto\UserRegistrationDto;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryContract
{
    public function register(UserRegistrationDto $dto): void
    {
        User::query()->create([
            'name' => $dto->name,
            'email' => $dto->email,
            'password' => Hash::make($dto->password),
        ]);

    }
}
