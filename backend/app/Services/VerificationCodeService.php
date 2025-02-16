<?php

namespace App\Services;

use App\Repositories\Contracts\VerificationCodeRepositoryInterface;
use Illuminate\Support\Facades\Mail;
use App\Mail\CodeMail;

class VerificationCodeService
{
    protected $repository;

    public function __construct(VerificationCodeRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function create($email)
    {
        $numbe1 = strval(str_pad(mt_rand(0, 999), 3, '0', STR_PAD_LEFT));
        $numbe2 = strval(str_pad(mt_rand(0, 999), 3, '0', STR_PAD_LEFT));
        $code = $numbe1 . $numbe2;

        $this->repository->create($email, $code);

        Mail::to($email)->send(new CodeMail($code));
    }

    public function find($email, $code)
    {
        return $this->find($email, $code);
    }

    public function verify($email, $code){
        $real_code = $this->find($email, $code);

        if(!$real_code || $real_code['expires_at'] < now()){
            return false;
        }

        return true;
    }

    public function delete($id)
    {
        return $this->delete($id);
    }
}
