<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

interface ModelRepositoryInterface
{
    public function model(): mixed;

    public function create(array $params): mixed;

    public function update(Model $model, array $params): mixed;

    public function findById(string $id): mixed;
}
