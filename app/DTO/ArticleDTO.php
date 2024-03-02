<?php

declare(strict_types=1);

namespace App\DTO;

use Spatie\LaravelData\Data;

class ArticleDTO extends Data
{
    public function __construct(
        public int $api_id,
        public string $title,
        public string $content,
    ) {
    }
}
