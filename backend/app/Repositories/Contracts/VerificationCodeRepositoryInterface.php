<?php

namespace App\Repositories\Contracts;

interface VerificationCodeRepositoryInterface
{
    public function create($email, $code);
    public function find($email, $code);
    public function delete($id);
}