<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Services\AccountService;
use App\Services\AdministratorService;
use App\Services\VerificationCodeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{   
    protected $accountService;
    protected $administratorService;
    protected $verificationCodeService;

    public function __construct(
        AccountService $accountService, 
        AdministratorService $administratorService,
        VerificationCodeService $verificationCodeService
    ){
        $this->accountService = $accountService;
        $this->administratorService = $administratorService;
        $this->verificationCodeService = $verificationCodeService;
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|max:255|min:8|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*?&#]/'
        ]);

        $user = Account::where([
            'email' => $validated['email'],
        ])->first();

        if(Hash::check($validated['password'], $user['password'])){
            $token = $user->createToken('NomeDoToken')->plainTextToken;

            return response()->json([
                'status' => "OK",
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
    }

    public function registerAccount(Request $request){
        return redirect()->action([AccountController::class, 'store'])->withInput();
    }

    public function editAccount(Request $request){
        return redirect()->action([AccountController::class, 'update'])->withInput();
    }

    public function deleteAccount(Request $request){
        return redirect()->action([AccountController::class, 'store'])->withInput();
    }
}
