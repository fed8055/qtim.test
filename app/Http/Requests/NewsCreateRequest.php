<?php

namespace App\Http\Requests;

use App\Dto\NewsStoreDto;
use Illuminate\Foundation\Http\FormRequest;

class NewsCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'header' => 'required|string',
            'text' => 'required|string',
        ];
    }

    public function toDto(): NewsStoreDto
    {
        return new  NewsStoreDto(
            header: $this->get('header'),
            text: $this->get('text'),
            userId: $this->user()->id
        );
    }
}
