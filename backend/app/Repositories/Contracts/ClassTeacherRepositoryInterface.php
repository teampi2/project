<?php

namespace App\Repositories\Contracts;

interface ClassTeacherRepositoryInterface
{
    public function all();
    public function findTurmasByUser($user_id);
    public function findUsersByTurma($turma_id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}