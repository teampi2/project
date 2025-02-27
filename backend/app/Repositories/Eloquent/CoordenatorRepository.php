<?php

namespace App\Repositories\Eloquent;

use App\Models\Coordinator;
use App\Repositories\Contracts\CoordinatorRepositoryInterface;
use Exception;

class CoordinatorRepository implements CoordinatorRepositoryInterface
{
    public function all()
    {
        return Coordinator::all();
    }

    public function find($id)
    {
        $Coordinator = Coordinator::with(['account'])->findOrFail($id);

        if (!$Coordinator) {
            return null;
        }

        return [
            'id' => $Coordinator->id,
            'email' => $Coordinator->email,
            'name' => $Coordinator->name,
            'account' => $Coordinator->account,
        ];
    }

    public function findByName($name)
    {
        $Coordinator = Coordinator::with(['account'])->where('name', $name)->first();

        if (!$Coordinator) {
            return null;
        }

        return [
            'id' => $Coordinator->id,
            'email' => $Coordinator->email,
            'name' => $Coordinator->name,
            'account' => $Coordinator->account,
        ];
    }

    public function findByEmail($email)
    {
        $Coordinator = Coordinator::with(['account'])->where('email', $email)->first();

        if (!$Coordinator) {
            return null;
        }

        return [
            'id' => $Coordinator->id,
            'email' => $Coordinator->email,
            'name' => $Coordinator->name,
            'account' => $Coordinator->account,
        ];
    }

    public function create(array $data)
    {
        return Coordinator::create($data);
    }

    public function update($id, array $data)
    {
        $Coordinator = Coordinator::find($id);
        $Coordinator->update($data);
        return $Coordinator;
    }

    public function delete($id)
    {
        return Coordinator::destroy($id);
    }
}