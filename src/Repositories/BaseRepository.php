<?php

namespace SurazDott\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use SurazDott\Repositories\Interfaces\BaseRepositoryInterface;

class BaseRepository implements BaseRepositoryInterface
{
    /**
     * Begin querying the model.
     */
    public function query(): Builder
    {
        return $this->model->newQuery();
    }

    /**
     * Return all database records.
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

    /**
     * Get paginate database records.
     *
     * @param  string  $perPage
     */
    public function paginate(string $perPage): LengthAwarePaginator
    {
        return $this->model->latest()->paginate($perPage);
    }

    /**
     * Get filtered database records.
     * 
     * @param  array  $filters
     */
    public function filter(array $filters): Builder
    {
        return $this->query()->where($filters);
    }

    /**
     * Find database record by id.
     */
    public function find(string $id): ?Model
    {
        return $this->model->find($id);
    }

    /**
     * Find or fail database record.
     */
    public function findOrFail(string $id): Model
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Get first record from database.
     */
    public function first(): ?Model
    {
        return $this->model->first();
    }

    /**
     * Create a record in database.
     */
    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    /**
     * Update database record by id.
     */
    public function update(string $id, array $data): bool
    {
        return $this->findOrFail($id)->update($data);
    }

    /**
     * Delete the record from the database.
     */
    public function delete(string $id): bool
    {
        return $this->findOrFail($id)->delete();
    }

    /**
     * Delete multiple records from the database.
     * 
     * @param array $ids
     */
    public function deleteMultiple(array $ids): bool
    {
        return $this->query()->whereIn('id', $ids)->delete();
    }
}
