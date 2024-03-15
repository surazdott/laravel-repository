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
     * @param  string  $perPage
     */
    public function paginate(string $perPage): LengthAwarePaginator;

    /**
     * Find database record by id.
     *
     * @param  mixed  $id
     */
    public function find(string $id): ?Model;

    /**
     * Find or fail database record.
     *
     * @param  mixed  $id
     */
    public function findOrFail(string $id): Model;

    /**
     * Get first record from database.
     */
    public function first(): ?Model;

    /**
     * Create a record in the database.
     *
     * @param  mixed  $data
     */
    public function create(array $data): Model;

    /**
     * Update the model in the database.
     *
     * @param  mixed  $id
     */
    public function update(string $id, array $data): bool;

    /**
     * Delete the model from the database.
     *
     * @param  mixed  $id
     */
    public function delete(string $id): bool;

    /**
     * Delete the records from the database.
     * 
     * @param array $ids
     */
    public function deleteMultiple(array $ids): bool;
}
