<?php

namespace App\Repositories\Eloquent;

use App\Models\Student;
use App\Repositories\Contracts\StudentRepositoryInterface;
use Exception;

class StudentRepository implements StudentRepositoryInterface
{
    public function all()
    {
        return Student::all();
    }

    public function find($id)
    {
        $Student = Student::with(['account'])->findOrFail($id);

        if (!$Student) {
            return null;
        }

        return [
            'id' => $Student->id,
            'email' => $Student->email,
            'name' => $Student->name,
            'account' => $Student->account,
        ];
    }

    public function findByName($name)
    {
        $Student = Student::with(['account'])->where('name', $name)->first();

        if (!$Student) {
            return null;
        }

        return [
            'id' => $Student->id,
            'email' => $Student->email,
            'name' => $Student->name,
            'account' => $Student->account,
        ];
    }

    public function findByEmail($email)
    {
        $Student = Student::with(['account'])->where('email', $email)->first();

        if (!$Student) {
            return null;
        }

        return [
            'id' => $Student->id,
            'email' => $Student->email,
            'name' => $Student->name,
            'account' => $Student->account,
        ];
    }

    public function create(array $data)
    {
        return Student::create($data);
    }

    public function update($id, array $data)
    {
        $Student = Student::find($id);
        $Student->update($data);
        return $Student;
    }

    public function delete($id)
    {
        return Student::destroy($id);
    }
}