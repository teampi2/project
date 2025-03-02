<?php

namespace App\Repositories\Eloquent;

use App\Models\Account;
use App\Repositories\Contracts\AccountRepositoryInterface;

class AccountRepository implements AccountRepositoryInterface
{
    public function all()
    {
        return Account::all();
    }

    public function find($id)
    {
        $account = Account::with(['administrator', 'coordinator', 'monitor', 'student'])->findOrFail($id);

        if (!$account) {
            return null;
        }

        return [
            'id' => $account->id,
            'email' => $account->email,
            'role' => $account->role,
            'status' => $account->status,
            'name' => $this->getAccountName($account)['name'],
        ];
    }

    public function findByEmail($email)
    {
        $account = Account::with(['administrator', 'coordinator', 'monitor', 'student'])->where('email', $email)->first();

        if (!$account) {
            return null;
        }

        $user = [
            'id' => $account->id,
            'email' => $account->email,
            'role' => $account->role,
            'status' => $account->status,
            'name' => $this->getAccountName($account)['name']
        ];

        return $user;
    }

    public function getAccountName(Account $account)
    {
        if ($account->administrator) {
            return ['name' => $account->administrator->name];
        } elseif ($account->coordinator) {
            return ['name' => $account->coordinator->name];
        } elseif ($account->monitor) {
            return ['name' => $account->monitor->name];
        } elseif ($account->student) {
            return ['name' => $account->student->name];
        }

        return ['type' => null, 'name' => null];
    }

    public function create(array $data)
    {
        return Account::create($data);
    }

    public function update($id, array $data)
    {
        $account = Account::findOrFail($id);
        $account->update($data);
        return $account;
    }

    public function delete($id)
    {
        return Account::destroy($id);
    }
}