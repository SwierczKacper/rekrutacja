<?php

declare(strict_types=1);

namespace App\Command;

use App\DTO\CommentDTO;

/**
 * @see CreateCommentCommandHandler
 */
readonly class CreateCommentCommand implements CommandTransactionalInterface
{
    public function __construct(
        public CommentDTO $data
    ) {
    }
}
