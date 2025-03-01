<?php

namespace App\Repositories\Contracts;

interface ClassesRepositoryInterface
{
    public function all();
    public function find($id);
    public function findByName($name);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}