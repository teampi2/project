<?php

namespace App\Services;

use App\Repositories\Contracts\ClassesRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class ClassesService
{
    protected $repository;    

    public function __construct(ClassesRepositoryInterface $repository)
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

    public function showByName($name)
    {
        return $this->repository->findByName($name);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}
