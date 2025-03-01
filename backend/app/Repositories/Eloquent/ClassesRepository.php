<?php

namespace App\Repositories\Eloquent;

use App\Models\Classes;
use App\Repositories\Contracts\ClassesRepositoryInterface;
use Exception;

class ClassesRepository implements ClassesRepositoryInterface
{
    public function all()
    {
        return Classes::all();
    }

    public function find($id)
    {
        $Classes = Classes::with(['school'])->findOrFail($id);

        if (!$Classes) {
            return null;
        }

        return [
            'name' => $Classes['name'],
		    'shift' => $Classes['shift'],
		    'academic_year' => $Classes['academic_year'],
		    'account_id' => $Classes['account_id'],
		    'school' => $Classes->school
        ];
    }

    public function findByName($name)
    {
        $Classes = Classes::with(['school'])->where('name', $name);

        if (!$Classes) {
            return null;
        }

        return [
            'name' => $Classes['name'],
		    'shift' => $Classes['shift'],
		    'academic_year' => $Classes['academic_year'],
		    'account_id' => $Classes['account_id'],
		    'school' => $Classes->school
        ];
    }
    
        
    

    public function create(array $data)
    {
        return Classes::create($data);
    }

    public function update($id, array $data)
    {
        $Classes = Classes::find($id);
        $Classes->update($data);
        return $Classes;
    }

    public function delete($id)
    {
        return Classes::destroy($id);
    }
}