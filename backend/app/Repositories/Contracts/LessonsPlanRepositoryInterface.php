<?php

namespace App\Repositories\Contracts;

interface LessonPlanRepositoryInterface
{
    public function all();
    public function find($id);
    public function findByTitle($title);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}