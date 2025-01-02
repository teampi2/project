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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
            ]);

            if(
                Administrator::where('name', $validated['name'])->where('email', $validated['email'])->exists() ||
                Coordinator::where('name', $validated['name'])->where('email', $validated['email'])->exists() ||
                Monitor::where('name', $validated['name'])->where('email', $validated['email'])->exists() ||
                Student::where('name', $validated['name'])->where('email', $validated['email'])->exists()
            ){
                $numbe1 = strval(str_pad(mt_rand(0, 999), 3, '0', STR_PAD_LEFT));
                $numbe2 = strval(str_pad(mt_rand(0, 999), 3, '0', STR_PAD_LEFT));
                $code = $numbe1 . $numbe2;

                VerificationCode::create([
                    'email' => $validated['email'],
                    'code' =>  $code,
                    'expires_at' => now()->addMinutes(5)
                ]);

                $data = [
                    'name' => $validated['name'],
                    'code' => $code
                ];

                Mail::to($validated['email'])->send(new CodeMail($data));

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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
