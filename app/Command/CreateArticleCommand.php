<?php

declare(strict_types=1);

namespace App\Command;

use App\DTO\ArticleDTO;
use App\Command\CommandTransactionalInterface;

/**
 * @see CreateArticleCommandHandler
 */
readonly class CreateArticleCommand implements CommandTransactionalInterface
{
    public function __construct(
        public ArticleDTO $data
    ) {
    }
}
