<?php

namespace App\Repositories\Eloquent;

use App\Models\Monitor;
use App\Repositories\Contracts\MonitorRepositoryInterface;
use Exception;

class MonitorRepository implements MonitorRepositoryInterface
{
    public function all()
    {
        return Monitor::all();
    }

    public function find($id)
    {
        $Monitor = Monitor::with(['account'])->findOrFail($id);

        if (!$Monitor) {
            return null;
        }

        return [
            'id' => $Monitor->id,
            'email' => $Monitor->email,
            'name' => $Monitor->name,
            'account' => $Monitor->account,
        ];
    }

    public function findByName($name)
    {
        $Monitor = Monitor::with(['account'])->where('name', $name)->first();

        if (!$Monitor) {
            return null;
        }

        return [
            'id' => $Monitor->id,
            'email' => $Monitor->email,
            'name' => $Monitor->name,
            'account' => $Monitor->account,
        ];
    }

    public function findByEmail($email)
    {
        $Monitor = Monitor::with(['account'])->where('email', $email)->first();

        if (!$Monitor) {
            return null;
        }

        return [
            'id' => $Monitor->id,
            'email' => $Monitor->email,
            'name' => $Monitor->name,
            'account' => $Monitor->account,
        ];
    }

    public function create(array $data)
    {
        return Monitor::create($data);
    }

    public function update($id, array $data)
    {
        $Monitor = Monitor::find($id);
        $Monitor->update($data);
        return $Monitor;
    }

    public function delete($id)
    {
        return Monitor::destroy($id);
    }
}