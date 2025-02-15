<?php

namespace App\Repositories\Contracts;

use App\Models\Account;

interface AccountRepositoryInterface
{
    public function all();
    public function find($id);
    public function findByEmail($email);
    public function getAccountName(Account $account);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}