<?php

namespace App\Repositories\Eloquent;

use App\Models\Activity;
use App\Repositories\Contracts\ActivityRepositoryInterface;
use Exception;

class ActivityRepository implements ActivityRepositoryInterface
{
    public function all()
    {
        return Activity::all();
    }

    public function find($id)
    {
        $Activity = Activity::with(['classes'])->findOrFail($id);

        if (!$Activity) {
            return null;
        }

        return [
            'id' => $Activity['id'],
            'title' => $Activity['title'],
		    'description' => $Activity['description'],
		    'file' => $Activity['file'],
		    'due_date' => $Activity['due_date'],
            'account_id' => $Activity['account_id'],
		    'classe' => $Activity->classes
        ];
    }

    public function findByTurma($id)
    {
        $Activity = Activity::where('class_id', $id)->get()->map(function ($Activity) {
            return [
                'id' => $Activity->id,
                'title' => $Activity->title,
                'description' => $Activity->description,
                'file' => $Activity->file,
                'due_date' => $Activity->due_date,
                'account_id' => $Activity->account_id,
            ];
        });

        if (!$Activity) {
            return null;
        }

        return $Activity;
    }

    public function create(array $data)
    {
        return Activity::create($data);
    }

    public function update($id, array $data)
    {
        $Activity = Activity::find($id);
        $Activity->update($data);
        return $Activity;
    }

    public function delete($id)
    {
        return Activity::destroy($id);
    }
}