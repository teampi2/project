<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Services\AccountService;
use App\Services\AdministratorService;
use App\Services\VerificationCodeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{   
    protected $accountService;

    public function __construct(
        AccountService $accountService
    ){
        $this->accountService = $accountService;
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|max:255|min:8'
        ]);

        $user = Account::where([
            'email' => $validated['email'],
        ])->first();

        if(Hash::check($validated['password'], $user->password)){
            $token = $user->createToken($user->email)->plainTextToken;

            return response()->json([
                'status' => "OK",
                'user' => $user,
                'token' => $token
            ], 200);
        }else{
            return response()->json([
                'status' => "Credenciais Erradas"
            ], 200);
        }
    }

    public function logout(Request $request)
    {
        $user = Auth::user();

        if ($user) {
            $user->tokens()->delete(); // Revoga todos os tokens se estiver usando Sanctum
        }

        return response()->json(['message' => 'Logout realizado com sucesso.']);
    }
}
