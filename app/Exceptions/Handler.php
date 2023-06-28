<?php

namespace App\Exceptions;

use App\Http\Response\Response;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $response = new Response();

        $this->renderable(function (ValidationException $e) use ($response) {
            return $response
                ->setStatusCode($e->status)
                ->setSuccess(false)
                ->addError($e->errors())
                ->format();
        });

        $this->renderable(function (Throwable $e) use ($response) {
            return $response
                ->setStatusCode($e->getCode())
                ->setSuccess(false)
                ->addError($e->getMessage())
                ->format();
        });
    }
}
