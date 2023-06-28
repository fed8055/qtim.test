<?php

namespace App\Http\Response;

use Symfony\Component\HttpFoundation\JsonResponse;

class Response extends JsonResponse
{
    protected array $errors = [];
    protected array $messages = [];
    protected bool $success = true;
    protected bool $redirect = false;

    public function __invoke()
    {
        return $this->format();
    }

    /**
     * @param string $message
     *
     * @return Response
     */
    public function addMessage(string $message): self
    {
        $this->messages[] = $message;

        return $this;
    }

    /**
     * @param bool $success
     *
     * @return Response
     */
    public function setSuccess(bool $success): self
    {
        $this->success = $success;

        return $this;
    }

    /**
     * @param string $token
     *
     * @return Response
     */
    public function setToken(string $token): self
    {
        $this->headers->set('Authorization', 'Bearer ' . $token);
        return $this;
    }

    public function format(): Response
    {
        $data = [
            'data'     => json_decode($this->data, true, 512, JSON_THROW_ON_ERROR),
            'errors'   => $this->errors,
            'messages' => $this->messages,
            'success'  => $this->success,
        ];
        ksort($data);
        $this->setJson(json_encode($data, JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE));

        return $this;
    }

    public function addError(string|array $error): self
    {
        $this->errors[] = $error;
        $this->success = false;

        return $this;
    }

    public function addErrors(iterable $iterable): self
    {
        foreach ($iterable as $error) {
            $this->addError($error);
        }

        return $this;
    }
}
