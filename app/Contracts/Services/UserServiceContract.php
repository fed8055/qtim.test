<?php

namespace App\Contracts\Services;

use App\Dto\UserRegistrationDto;

interface UserServiceContract
{
    public function register(UserRegistrationDto $dto): void;

    public function formTokenResponse(string $token): array;
}
