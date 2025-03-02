<?php

namespace App\Repositories\Eloquent;

use App\Models\ClassTeacher;
use App\Repositories\Contracts\ClassTeacherRepositoryInterface;
use Exception;

class ClassTeacherRepository implements ClassTeacherRepositoryInterface
{
    public function all()
    {
        return ClassTeacher::all();
    }

    public function findUsersByTurma($turma_id)
    {
        $ClassTeacher = ClassTeacher::with(['account'])->where('class_id', $turma_id)->get();

        if (!$ClassTeacher) {
            return null;
        }

        return [
            'class_id' => $turma_id,
		    'teachers' => $ClassTeacher->pluck('account')->toArray()
        ];
    } 

    public function findTurmasByUser($user_id)
    {
        $ClassTeacher = ClassTeacher::with(['classes'])->where('account_id', $user_id)->get();

        if (!$ClassTeacher) {
            return null;
        }

        return [
            'student_id' => $user_id,
            'classes' => $ClassTeacher->pluck('classes')->toArray()
        ];
    }

    public function create(array $data)
    {
        return ClassTeacher::create($data);
    }

    public function update($id, array $data)
    {
        $ClassTeacher = ClassTeacher::find($id);
        $ClassTeacher->update($data);
        return $ClassTeacher;
    }

    public function delete($id)
    {
        return ClassTeacher::destroy($id);
    }
}