<?php

namespace App\Services;

use App\Repositories\Contracts\AccountRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class AccountService
{
    protected $repository;    

    public function __construct(AccountRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function create(array $data)
    {
        if($data['password']){
            $data['password'] = Hash::make($data['password']);
        }
        return $this->repository->create($data);
    }

    public function update($id, array $data)
    {
        if($data['password']){
            $data['password'] = Hash::make($data['password']);
        }

        return $this->repository->update($id, $data);
    }

    public function all()
    {
        return $this->repository->all();
    }

    public function show($id)
    {
        return $this->repository->find($id);
    }

    public function showByEmail($email)
    {
        return $this->repository->findByEmail($email);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}
