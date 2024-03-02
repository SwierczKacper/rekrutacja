<?php

declare(strict_types=1);

namespace App\DTO;

use Spatie\LaravelData\Data;

class CommentDTO extends Data
{
    public function __construct(
        public string $article_id,
        public string $name,
        public string $email,
        public string $content,
    ) {
    }
}
