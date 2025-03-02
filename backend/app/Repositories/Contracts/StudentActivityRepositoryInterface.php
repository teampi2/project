<?php

namespace App\Repositories\Contracts;

interface StudentActivityRepositoryInterface
{
    public function all($id);
    public function find($activity_id, $student_id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}