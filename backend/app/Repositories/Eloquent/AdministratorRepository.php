<?php

namespace App\Repositories\Eloquent;

use App\Models\Administrator;
use App\Repositories\Contracts\AdministratorRepositoryInterface;

class AdministratorRepository implements AdministratorRepositoryInterface
{
    public function all()
    {
        return Administrator::all();
    }

    public function find($id)
    {
        $Administrator = Administrator::with(['account'])->findOrFail($id);

        if (!$Administrator) {
            return null;
        }

        return [
            'id' => $Administrator->id,
            'email' => $Administrator->email,
            'name' => $Administrator->name,
            'account' => $Administrator->account,
        ];
    }

    public function findByName($name)
    {
        $Administrator = Administrator::with(['account'])->where('name', $name)->first();

        if (!$Administrator) {
            return null;
        }

        return [
            'id' => $Administrator->id,
            'email' => $Administrator->email,
            'name' => $Administrator->name,
            'account' => $Administrator->account,
        ];
    }

    public function create(array $data)
    {
        return Administrator::create($data);
    }

    public function update($id, array $data)
    {
        $Administrator = Administrator::findOrFail($id);
        $Administrator->update($data);
        return $Administrator;
    }

    public function delete($id)
    {
        return Administrator::destroy($id);
    }
}