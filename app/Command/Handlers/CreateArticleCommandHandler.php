<?php

declare(strict_types=1);

namespace App\Command\Handlers;

use App\Command\CommandHandlerInterface;
use App\Command\CommandInterface;
use App\Command\CreateArticleCommand;
use App\Repositories\ArticleRepository;
use Throwable;

readonly class CreateArticleCommandHandler implements CommandHandlerInterface
{
    public function __construct(
        private ArticleRepository $repository,
    ) {
    }

    /**
     * @param CreateArticleCommand $command
     * @throws Throwable
     */
    public function handle(CommandInterface $command): void
    {
        $this->repository->create($command->data->toArray());
    }
}
