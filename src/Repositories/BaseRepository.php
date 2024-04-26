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
     * Find database record by ID.
     * 
     * @param  string  $id
     */
    public function find(string $id): ?Model
    {
        return $this->model->find($id);
    }

    /**
     * Find or fail database record.
     * 
     * @param  string  $id
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
     * 
     * @param  array  $data
     */
    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    /**
     * Update database record by ID.
     * 
     * @param  string  $id, array $data
     */
    public function update(string $id, array $data): bool
    {
        return $this->findOrFail($id)->update($data);
    }

    /**
     * Delete the models for the given IDs.
     *
     * @param  \Illuminate\Support\Collection|array|int|string  $ids
     */
    public function delete(mixed $ids): bool
    {
        return $this->model->destroy($ids);
    }
}
