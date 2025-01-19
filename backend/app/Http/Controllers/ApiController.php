<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    public function login(Request $request){
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
}
