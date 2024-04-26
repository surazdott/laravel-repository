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
    public function paginate(string $perPage): LengthAwarePaginator
    {
        return $this->repository->paginate($perPage);
    }

    /**
     * Find database record by id.
     *
     * @param  string  $id
     */
    public function find(string $id): ?Model
    {
        return $this->repository->find($id);
    }

    /**
     * Find or fail database record.
     *
     * @param  string  $id
     */
    public function findOrFail(string $id): Model
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
    public function create(array $data): Model
    {
        return $this->repository->create($data);
    }

    /**
     * Update database record by ID.
     *
     * @param  string  $id
     */
    public function update(string $id, array $data): bool
    {
        return $this->repository->update($id, $data);
    }

    /**
     * Delete the models for the given IDs.
     *
     * @param  \Illuminate\Support\Collection|array|int|string  $ids
     */
    public function delete(mixed $id): bool
    {
        return $this->repository->delete($id);
    }
}
