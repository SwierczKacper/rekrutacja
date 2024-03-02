<?php

declare(strict_types=1);

namespace App\Command\Adapters;

use App\Command\CommandBusInterface;
use App\Command\CommandInterface;
use App\Command\CommandTransactionalInterface;
use App\Command\Pipes\TransactionPipe;
use Illuminate\Contracts\Bus\Dispatcher as DispatcherContract;

class LaravelCommandBus implements CommandBusInterface
{
    public function __construct(
        private DispatcherContract $bus
    ) {
    }

    public function dispatch(CommandInterface $command): void
    {
        $this->bus->pipeThrough(
            $this->commandShouldUseTransaction($command)
                ? [TransactionPipe::class]
                : []
        )->dispatch($command);
    }

    public function dispatchMany(CommandInterface ...$commands): void
    {
        foreach ($commands as $command) {
            $this->dispatch($command);
        }
    }

    public function map(array $map): void
    {
        $this->bus->map($map);
    }

    protected function commandShouldUseTransaction(CommandInterface $command): bool
    {
        return $command instanceof CommandTransactionalInterface;
    }
}
