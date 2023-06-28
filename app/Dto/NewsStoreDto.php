<?php

namespace App\Dto;

class NewsStoreDto
{
    /**
     * @param string $header
     * @param string $text
     */
    public function __construct(
        public readonly string $header,
        public readonly string $text,
        public readonly int $userId,
    )
    {
    }
}
