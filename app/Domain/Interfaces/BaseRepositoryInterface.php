<?php

namespace App\Domain\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
{
    /**
     * Get all models.
     */
    public function all(array $columns = ['*'], array $relations = []): Collection;

    /**
     * Get all trashed models.
     */
    public function allTrashed(): Collection;

    /**
     * Find model by id.
     */
    public function findById(
        int $id,
        array $columns = ['*'],
        array $relations = [],
        array $appends = []
    ): ?Model;

    /**
     * Find trashed model by id.
     */
    public function findTrashedById(int $id): ?Model;

    /**
     * Find only trashed model by id.
     */
    public function findOnlyTrashedById(int $id): ?Model;

    /**
     * Create a model.
     */
    public function create(array $payload): ?Model;

    /**
     * Update existing model.
     */
    public function update(int $id, array $payload): bool;

    /**
     * Delete model by id.
     */
    public function deleteById(int $id): bool;

    /**
     * Restore model by id.
     */
    public function restoreById(int $id): bool;

    /**
     * Permanently delete model by id.
     */
    public function permanentlyDeleteById(int $id): bool;

    /**
     * Get last model.
     */
    public function last(
        array $columns = ['*'],
        array $relations = [],
        array $appends = []
    ): ?Model;

    /**
     * Get first model.
     */
    public function first(
        array $columns = ['*'],
        array $relations = [],
        array $appends = []
    ): ?Model;

    /**
     * Count models.
     */
    public function count(): ?int;
}