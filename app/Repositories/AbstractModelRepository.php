<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\UuidInterface;

abstract class AbstractModelRepository implements ModelRepositoryInterface
{
    abstract public function model(): Model;

    public function all(array $withoutScopes = [], array $eagerLoadRelations = []): Collection|array
    {
        return $this->query()
            ->withoutGlobalScopes($withoutScopes)
            ->with($eagerLoadRelations)
            ->get();
    }

    public function paginate(int $perPage = 5, array $eagerLoadRelations = [], array $withoutScopes = []): LengthAwarePaginator
    {
        return $this->query()
            ->withoutGlobalScopes($withoutScopes)
            ->with($eagerLoadRelations)
            ->paginate($perPage);
    }

    public function create(array $params): Model
    {
        return $this->query()
            ->create($params);
    }

    public function update(Model $model, array $params): Model
    {
        $model->fill($params)
            ->save();

        return $model;
    }

    public function delete(Model $model): void
    {
        $model->delete();
    }

    public function findById(UuidInterface|int|string $id): Builder|array|Model
    {
        return $this->query()
            ->withoutGlobalScopes()
            ->findOrFail($id instanceof UuidInterface ? $id->toString() : $id);
    }

    public function firstById(UuidInterface|int|string $id): Builder|null
    {
        return $this->query()
            ->where('id', $id instanceof UuidInterface ? $id->toString() : $id)
            ->first();
    }

    protected function query(): Builder
    {
        return $this->model()
            ->query();
    }
}
