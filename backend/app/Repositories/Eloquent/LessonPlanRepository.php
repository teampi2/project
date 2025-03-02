<?php

namespace App\Repositories\Eloquent;

use App\Models\LessonPlan;
use App\Repositories\Contracts\LessonPlanRepositoryInterface;
use Exception;

class LessonPlanRepository implements LessonPlanRepositoryInterface
{
    public function all()
    {
        return LessonPlan::all();
    }

    public function find($id)
    {
        $LessonPlan = LessonPlan::findOrFail($id);

        if (!$LessonPlan) {
            return null;
        }

        return $LessonPlan;
    }

    public function findByTitle($title)
    {
        $LessonPlan = LessonPlan::where('title', $title)->first();

        if (!$LessonPlan) {
            return null;
        }

        return $LessonPlan;
    }

    public function create(array $data)
    {
        return LessonPlan::create($data);
    }

    public function update($id, array $data)
    {
        $LessonPlan = LessonPlan::find($id);
        $LessonPlan->update($data);
        return $LessonPlan;
    }

    public function delete($id)
    {
        return LessonPlan::destroy($id);
    }
}