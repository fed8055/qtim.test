<?php
namespace App\Http\Controllers;

use App\Contracts\Services\UserServiceContract;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Response\Response;
use JsonException;

class UserController extends Controller
{
    /**
     * @throws JsonException
     */
    public function register(UserRegisterRequest $request, UserServiceContract $userService): Response
    {
        $userService->register($request->toDto());

        return (new Response())->format();
    }

    /**
     * @throws JsonException
     */
    public function login(UserLoginRequest $request, UserServiceContract $userService): Response
    {
        return (new Response(
            $userService->formTokenResponse()
        ))->format();
    }

    public function me(): Response
    {
        return new Response(auth()->user());
    }

    public function logout(): Response
    {
        auth()->logout();

        return (new Response())->addMessage('Successfully logged out');
    }

    /**
     * @throws JsonException
     */
    public function refresh(UserServiceContract $userService): Response
    {
        return (new Response(
            $userService->formTokenResponse(auth()->refresh())//todo investigate
        ))->format();
    }
}
