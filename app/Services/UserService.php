<?php

namespace App\Services;

use App\Contracts\Repositories\UserRepositoryContract;
use App\Contracts\Services\UserServiceContract;
use App\Dto\UserRegistrationDto;
use App\Models\User;

class UserService implements UserServiceContract
{
    public function __construct(
        private readonly UserRepositoryContract $userRepository
    )
    {
    }

    public function register(UserRegistrationDto $dto): void
    {
        $this->userRepository->register($dto);
    }

    public function formTokenResponse(string $token = null): array
    {
        if (is_null($token)) {
            /** @var User $user */
            $user = auth()->user();
            /** @var string $token */
            $token = $user->createToken($user->name)->plainTextToken;
        }

        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60//todo investigate
        ];
    }
}
