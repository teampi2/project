<?php

namespace App\Repositories\Eloquent;

use App\Models\ClassStudent;
use App\Repositories\Contracts\ClassStudentRepositoryInterface;
use Exception;

class ClassStudentRepository implements ClassStudentRepositoryInterface
{
    public function all()
    {
        return ClassStudent::all();
    }

    public function findUsersByTurma($turma_id)
    {
        $ClassStudent = ClassStudent::with(['student'])->where('class_id', $turma_id)->get();

        if (!$ClassStudent) {
            return null;
        }

        return [
            'class_id' => $turma_id,
		    'students' => $ClassStudent->pluck('student')->toArray()
        ];
    } 

    public function findTurmasByUser($user_id)
    {
        $ClassStudent = ClassStudent::with(['classes'])->where('student_id', $user_id)->get();

        if (!$ClassStudent) {
            return null;
        }

        return [
            'student_id' => $user_id,
            'classes' => $ClassStudent->pluck('classes')->toArray()
        ];
    }

    public function create(array $data)
    {
        return ClassStudent::create($data);
    }

    public function update($id, array $data)
    {
        $ClassStudent = ClassStudent::find($id);
        $ClassStudent->update($data);
        return $ClassStudent;
    }

    public function delete($id)
    {
        return ClassStudent::destroy($id);
    }
}