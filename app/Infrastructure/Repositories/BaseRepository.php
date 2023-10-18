<?php

namespace App\Infrastructure\Repositories;

use App\Infrastructure\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface
{
    /**
     * BaseRepository constructor.
     */
    public function __construct(
        public Model $model,
    ) {
    }

    /**
     * Get all models.
     */
    public function all(array $columns = ['*'], array $relations = []): Collection
    {
        return $this->model->with($relations)->get($columns);
    }

    /**
     * Get all trashed models.
     */
    public function allTrashed(): Collection
    {
        return $this->model->onlyTrashed()->get();
    }

    /**
     * Find model by id.
     */
    public function findById(
        int $id,
        array $columns = ['*'],
        array $relations = [],
        array $appends = []
    ): ?Model {
        return $this->model->select($columns)
            ->with($relations)
            ->findOrFail($id)
            ->append($appends);
    }

    /**
     * Find trashed model by id.
     */
    public function findTrashedById(int $id): ?Model
    {
        return $this->model->withTrashed()->findOrFail($id);
    }

    /**
     * Find only trashed model by id.
     */
    public function findOnlyTrashedById(int $id): ?Model
    {
        return $this->model->onlyTrashed()->findOrFail($id);
    }

    /**
     * Create a model.
     */
    public function create(array $payload): ?Model
    {
        $model = $this->model->create($payload);

        return $model->fresh();
    }

    /**
     * Update existing model.
     */
    public function update(int $id, array $payload): bool
    {
        $model = $this->findById($id);

        return $model->update($payload);
    }

    /**
     * Delete model by id.
     */
    public function deleteById(int $id): bool
    {
        return $this->findById($id)->delete();
    }

    /**
     * Restore model by id.
     */
    public function restoreById(int $id): bool
    {
        return $this->findOnlyTrashedById($id)->restore();
    }

    /**
     * Permanently delete model by id.
     */
    public function permanentlyDeleteById(int $id): bool
    {
        return $this->findTrashedById($id)->forceDelete();
    }

    /**
     * Get last model.
     */
    public function last(
        array $columns = ['*'],
        array $relations = [],
        array $appends = []
    ): ?Model {
        return $this->model->select($columns)
            ->with($relations)
            ->latest('id')
            ->first()
            ->append($appends);
    }

    /**
     * Get first model.
     */
    public function first(
        array $columns = ['*'],
        array $relations = [],
        array $appends = []
    ): ?Model {
        return $this->model->select($columns)
            ->with($relations)
            ->first()
            ->append($appends);
    }

    /**
     * Count models.
     */
    public function count(): ?int 
    {
        return $this->model->count();
    }
}