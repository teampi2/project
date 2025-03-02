<?php

namespace App\Services;

use App\Repositories\Contracts\ClassStudentRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class ClassStudentService
{
    protected $repository;    

    public function __construct(ClassStudentRepositoryInterface $repository)
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

    public function showByTurmasForUser($id)
    {
        return $this->repository->findTurmasByUser($id);
    }

    public function showByUsersForTurma($id)
    {
        return $this->repository->findUsersByTurma($id);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}
