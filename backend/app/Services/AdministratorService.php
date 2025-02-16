<?php

namespace App\Services;

use App\Repositories\Contracts\AdministratorRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class AdministratorService
{
    protected $repository;    

    public function __construct(AdministratorRepositoryInterface $repository)
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

    public function show($id)
    {
        return $this->repository->find($id);
    }

    public function showByEmail($name)
    {
        return $this->repository->findByName($name);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}
