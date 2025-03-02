<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Administrator;
use App\Models\Coordinator;
use App\Models\Monitor;
use App\Models\Student;
use App\Services\AccountService;
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

    public function me(Request $resquest){
        $user = Auth::user();
        $name = null;
        if($user->role == "ADMINISTRATOR"){
            $name = Administrator::where('email', $user->email)->first();
        }
        if($user->role == "MONITOR"){
            $name = Monitor::where('email', $user->email)->first();
        }
        if($user->role == "COORDINATOR"){
            $name = Coordinator::where('email', $user->email)->first();
        }
        if($user->role == "STUDENT"){
            $name = Student::where('email', $user->email)->first();
        }

        $user_response = [
            "id" => $user['id'],
            "email" => $user['email'],
            "image" => $user['image'],
            "status" => $user['status'],
            "role" => $user['role'],
            "created_at" => $user['created_at'],
            "updated_at" => $user['update_at'],
            "role_id" => $user['role_id'],
            "name" => $name['name']
        ];

        return response()->json([
            'user' => $user_response
        ], 200);
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
        
        $name = null;
        if($user->role == "ADMINISTRATOR"){
            $name = Administrator::where('email', $validated['email'])->first();
        }
        if($user->role == "MONITOR"){
            $name = Monitor::where('email', $validated['email'])->first();
        }
        if($user->role == "COORDINATOR"){
            $name = Coordinator::where('email', $validated['email'])->first();
        }
        if($user->role == "STUDENT"){
            $name = Student::where('email', $validated['email'])->first();
        }

        if(Hash::check($validated['password'], $user->password)){
            $token = $user->createToken($user->email)->plainTextToken;

            $user_response = [
                "id" => $user['id'],
                "email" => $user['email'],
                "image" => $user['image'],
                "status" => $user['status'],
                "role" => $user['role'],
                "created_at" => $user['created_at'],
                "updated_at" => $user['update_at'],
                "role_id" => $user['role_id'],
                "name" => $name['name']
            ];
    
            return response()->json([
                'user' => $user_response,
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
