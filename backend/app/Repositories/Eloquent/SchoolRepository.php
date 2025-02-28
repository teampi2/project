<?php

namespace App\Repositories\Eloquent;

use App\Models\School;
use App\Repositories\Contracts\SchoolRepositoryInterface;
use Exception;

class SchoolRepository implements SchoolRepositoryInterface
{
    public function all()
    {
        return School::all();
    }

    public function find($id)
    {
        $School = School::findOrFail($id);

        if (!$School) {
            return null;
        }

        return [
            'name' => $School['name'],
		    'cnpj'  => $School['cnpj'],
		    'address'  => $School['address'],
		    'email'  => $School['email'],
		    'phone'  => $School['phone'],
		    'file'  => $School['file']
        ];
    }

    public function findByName($name)
    {
        $School = School::where('name', $name)->first();

        if (!$School) {
            return null;
        }

        return [
            'name' => $School['name'],
		    'cnpj'  => $School['cnpj'],
		    'address'  => $School['address'],
		    'email'  => $School['email'],
		    'phone'  => $School['phone'],
		    'file'  => $School['file']
        ];
    }

    public function findByEmail($email)
    {
        $School = School::where('email', $email)->first();

        if (!$School) {
            return null;
        }

        return [
            'name' => $School['name'],
		    'cnpj'  => $School['cnpj'],
		    'address'  => $School['address'],
		    'email'  => $School['email'],
		    'phone'  => $School['phone'],
		    'file'  => $School['file']
        ];
    }

    public function create(array $data)
    {
        return School::create($data);
    }

    public function update($id, array $data)
    {
        $School = School::find($id);
        $School->update($data);
        return $School;
    }

    public function delete($id)
    {
        return School::destroy($id);
    }
}