<?php

namespace App\Services;

use App\Repositories\Contracts\ActivityRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class ActivityService
{
    protected $repository;    

    public function __construct(ActivityRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    public function all()
    {
        return $this->repository->all();
    }

    public function show($id)
    {
        return $this->repository->find($id);
    }

    public function showByTurma($id)
    {
        return $this->repository->findByTurma($id);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}
