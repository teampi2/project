<?php

namespace App\Repositories\Eloquent;

use App\Models\Lesson;
use App\Repositories\Contracts\LessonRepositoryInterface;
use Exception;

class LessonRepository implements LessonRepositoryInterface
{
    public function all()
    {
        return Lesson::all();
    }

    public function find($id)
    {
        $Lesson = Lesson::findOrFail($id);

        if (!$Lesson) {
            return null;
        }

        return $Lesson;
    }

    public function findByTitle($title)
    {
        $Lesson = Lesson::where('title', $title)->first();

        if (!$Lesson) {
            return null;
        }

        return $Lesson;
    }

    public function create(array $data)
    {
        return Lesson::create($data);
    }

    public function update($id, array $data)
    {
        $Lesson = Lesson::find($id);
        $Lesson->update($data);
        return $Lesson;
    }

    public function delete($id)
    {
        return Lesson::destroy($id);
    }
}