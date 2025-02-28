<?php

namespace App\Repositories\Contracts;

interface SchoolRepositoryInterface
{
    public function all();
    public function find($id);
    public function findByName($name);
    public function findByEmail($email);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}