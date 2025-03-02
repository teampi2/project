<?php

namespace App\Repositories\Contracts;

interface ActivityRepositoryInterface
{
    public function all();
    public function find($id);
    public function findByTurma($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}