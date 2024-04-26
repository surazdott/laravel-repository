<?php

namespace SurazDott\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface BaseRepositoryInterface
{
    /**
     * Begin querying the model.
     */
    public function query(): Builder;

    /**
     * Fetch all database records
     */
    public function all(): Collection;

    /**
     * Get paginate database records.
     *
     * @param  int  $perPage
     */
    public function paginate(int $perPage): LengthAwarePaginator;

    /**
     * Find database record by ID.
     *
     * @param  int|string  $id
     */
    public function find(mixed $id): ?Model;

    /**
     * Find or fail database record by ID.
     *
     * @param  int|string  $id
     */
    public function findOrFail(mixed $id): Model;

    /**
     * Get first record from database.
     */
    public function first(): ?Model;

    /**
     * Create a record in the database.
     *
     * @param  array  $data
     */
    public function create(array $data): Model;

    /**
     * Update database record by ID.
     *
     * @param  int|string  $id,  array  $data
     */
    public function update(mixed $id, array $data): bool;

    /**
     * Delete the models for the given IDs.
     *
     * @param  \Illuminate\Support\Collection|array|int|string  $ids
     */
    public function delete(mixed $ids): bool;
}
