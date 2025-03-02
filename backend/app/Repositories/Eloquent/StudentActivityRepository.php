<?php

namespace App\Repositories\Eloquent;

use App\Models\StudentActivity;
use App\Repositories\Contracts\StudentActivityRepositoryInterface;
use Exception;

class StudentActivityRepository implements StudentActivityRepositoryInterface
{
    public function all($id)
    {
        return StudentActivity::where('activity_id', $id)->get();
    }

    public function find($activity_id, $student_id)
    {
        $StudentActivity = StudentActivity::where([
            'activity_id' => $activity_id,
            'student_id' => $student_id
        ])->first();

        if (!$StudentActivity) {
            return null;
        }

        return [
            'id' => $StudentActivity['id'],
            'score' => $StudentActivity['score'],
		    'file' => $StudentActivity['file'],
		    'submission_date' => $StudentActivity['submission_date'],
        ];
    }

    public function create(array $data)
    {
        return StudentActivity::create($data);
    }

    public function update($id, array $data)
    {
        $StudentActivity = StudentActivity::find($id);
        $StudentActivity->update($data);
        return $StudentActivity;
    }

    public function delete($id)
    {
        return StudentActivity::destroy($id);
    }
}