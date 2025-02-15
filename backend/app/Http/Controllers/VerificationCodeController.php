<?php

namespace App\Http\Controllers;

use App\Mail\CodeMail;
use App\Models\Administrator;
use App\Models\Coordinator;
use App\Models\Monitor;
use App\Models\Student;
use App\Models\VerificationCode;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VerificationCodeController extends Controller
{
    public function index()
    {
        //
    }

    public function validate(Request $request){
        return $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);
    }

    public function create($email)
    {
        $numbe1 = strval(str_pad(mt_rand(0, 999), 3, '0', STR_PAD_LEFT));
        $numbe2 = strval(str_pad(mt_rand(0, 999), 3, '0', STR_PAD_LEFT));
        $code = $numbe1 . $numbe2;

        $verificationCode = VerificationCode::create([
            'email' => $email,
            'code' =>  $code,
            'expires_at' => now()->addMinutes(5)
        ]);

        return $verificationCode;
    }

    public function enviarEmail($email, $code){
        Mail::to($email)->send(new CodeMail($code));
    }

    public function buscar($email, $code){
        return VerificationCode::where([
            'email' => $email,
            'code' => $code,
        ])->first();
    }

    public function store(Request $request)
    {
        try{
            $validated = VerificationCode::validate($request);

            if(
                Administrator::where('name', $validated['name'])->where('email', $validated['email'])->exists() ||
                Coordinator::where('name', $validated['name'])->where('email', $validated['email'])->exists() ||
                Monitor::where('name', $validated['name'])->where('email', $validated['email'])->exists() ||
                Student::where('name', $validated['name'])->where('email', $validated['email'])->exists()
            ){
                $code = VerificationCode::create($validated['email']);

                VerificationCode::enviarEmail($validated['email'], $code);

                return response()->json([
                    'status' => "E-mail enviado com sucesso"
                ], 200);
            }
        }
        catch(Exception $e){
            return response()->json([
                'error' => "$e"
            ], 400);
        }
    }
}
