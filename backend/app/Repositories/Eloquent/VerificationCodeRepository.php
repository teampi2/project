<?php

namespace App\Repositories\Eloquent;

use App\Models\VerificationCode;
use App\Repositories\Contracts\VerificationCodeRepositoryInterface;

class VerificationCodeRepository implements VerificationCodeRepositoryInterface
{
    public function create($email, $code)
    {
        return VerificationCode::create([
            'email' => $email,
            'code' =>  $code,
            'expires_at' => now()->addMinutes(7)
        ]);
    }

    public function find($email, $code)
    {
        return VerificationCode::where([
            'email' => $email,
            'code' => $code
        ])->get();
    }

    public function delete($id)
    {
        return VerificationCode::destroy($id);
    }
}