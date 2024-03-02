<?php

declare(strict_types=1);

namespace App\Command;

interface CommandBusInterface
{
    public function dispatch(CommandInterface $command): void;

    public function dispatchMany(CommandInterface ...$commands): void;

    public function map(array $map): void;
}
