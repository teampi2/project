<?php

namespace App\Services;

use App\Repositories\Contracts\StudentActivityRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class StudentActivityService
{
    protected $repository;    

    public function __construct(StudentActivityRepositoryInterface $repository)
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

    public function all($activity_id)
    {
        return $this->repository->all($activity_id);
    }

    public function show($activity_id, $student_id)
    {
        return $this->repository->find($activity_id, $student_id);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}
