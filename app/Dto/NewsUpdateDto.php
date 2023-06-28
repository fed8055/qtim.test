<?php

namespace App\Dto;

class NewsUpdateDto
{
    public function __construct(
        public readonly int $id,
        public readonly string $header,
        public readonly string $text
    )
    {
    }
}
