<?php

namespace App\Services;

use App\Repositories\Contracts\LessonRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class LessonService
{
    protected $repository;    

    public function __construct(LessonRepositoryInterface $repository)
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

    public function showByTitle($title)
    {
        return $this->repository->findByTitle($title);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}
