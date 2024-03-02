<?php

declare(strict_types=1);

namespace App\Providers;

use App\Command\CreateArticleCommand;
use App\Command\CreateCommentCommand;
use App\Command\Handlers\CreateArticleCommandHandler;
use App\Command\Handlers\CreateCommentCommandHandler;

class CoreCommandBusServiceProvider extends CommandBusServiceProvider
{
    protected array $commands = [
        CreateArticleCommand::class => CreateArticleCommandHandler::class,
        CreateCommentCommand::class => CreateCommentCommandHandler::class,
    ];
}
