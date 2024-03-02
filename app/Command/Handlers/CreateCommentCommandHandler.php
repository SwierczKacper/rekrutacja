<?php

declare(strict_types=1);

namespace App\Command\Handlers;

use App\Command\CommandHandlerInterface;
use App\Command\CommandInterface;
use App\Command\CreateCommentCommand;
use App\Repositories\CommentRepository;
use Throwable;

readonly class CreateCommentCommandHandler implements CommandHandlerInterface
{
    public function __construct(
        private CommentRepository $repository,
    ) {
    }

    /**
     * @param CreateCommentCommand $command
     * @throws Throwable
     */
    public function handle(CommandInterface $command): void
    {
        $this->repository->create($command->data->toArray());
    }
}
