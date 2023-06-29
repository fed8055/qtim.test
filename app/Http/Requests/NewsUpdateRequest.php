<?php

namespace App\Http\Requests;

use App\Dto\NewsUpdateDto;
use Illuminate\Foundation\Http\FormRequest;

class NewsUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'header' => 'required|string',
            'text' => 'required|string',
        ];
    }

    public function toDto(): NewsUpdateDto
    {
        /** @var int $id */
        $id = $this->route('id');

        return new NewsUpdateDto(
            id: $id,
            header: $this->get('header'),
            text: $this->get('text')
        );
    }
}
