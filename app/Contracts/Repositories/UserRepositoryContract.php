<?php

namespace App\Contracts\Repositories;

use App\Dto\UserRegistrationDto;

interface UserRepositoryContract
{
    public function register(UserRegistrationDto $dto): void;
}
