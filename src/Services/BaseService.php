<?php

namespace SurazDott\Services;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class BaseService
{
    /**
     * Begin querying the repository.
     */
    public function query(): Builder
    {
        return $this->repository->query();
    }

    /**
     * Return all database records.
     */
    public function all(): Collection
    {
        return $this->repository->all();
    }

    /**
     * Get paginate database records.
     *
     * @param  string  $perPage
     */
    public function paginate($perPage): LengthAwarePaginator
    {
        return $this->repository->paginate($perPage);
    }

    /**
     * Get filtered database records.
     * 
     * @param  array  $filters
     */
    public function filter(array $filters): Builder
    {
        return $this->repository->filter($filters);
    }

    /**
     * Find database record by id.
     *
     * @param  string  $id
     */
    public function find($id): ?Model
    {
        return $this->repository->find($id);
    }

    /**
     * Find or fail database record.
     *
     * @param  string  $id
     */
    public function findOrFail($id): Model
    {
        return $this->repository->findOrFail($id);
    }

    /**
     * Get first record from database.
     */
    public function first(): ?Model
    {
        return $this->repository->first();
    }

    /**
     * Create a record in database.
     *
     * @param  array  $data
     */
    public function create($data): Model
    {
        return $this->repository->create($data);
    }

    /**
     * Update database record by id.
     *
     * @param  string  $id
     */
    public function update($id, array $data): bool
    {
        return $this->repository->update($id, $data);
    }

    /**
     * Delete database record by id.
     *
     * @param  string  $id
     */
    public function delete($id): bool
    {
        return $this->repository->delete($id);
    }

    /**
     * Delete multiple records from the database.
     * 
     * @param array $ids
     */
    public function deleteMultiple(array $ids): bool
    {
        return $this->repository->deleteMultiple($ids);
    }
}
