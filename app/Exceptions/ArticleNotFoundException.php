<?php

declare(strict_types=1);

namespace App\Exceptions;

use Exception;

class ArticleNotFoundException extends Exception
{
    public function __construct(
        public int $apiId,
    ) {
        parent::__construct("Article with API ID {$this->apiId} not found.");
    }
}
