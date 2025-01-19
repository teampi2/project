<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\VerificationCode;
use Exception;
use Illuminate\Http\Request;

class AccountController extends Controller
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
                'email' => 'required|string|email|max:255',
                'password' => 'required|string|max:255|min:8|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*?&#]/',
                'image' => 'mimes:jpg,jpeg,png,gif|image|max:2048',
                'status' => 'in:ACTIVE,INACTIVE',
                'role' => 'required|in:ADMINISTRATOR,COORDINATOR,MONITOR,STUDENT',
                'code' => 'required|string|size:6',
            ]);

            $code = VerificationCode::where([
                'email' => $validated['email'],
                'code' => $validated['code'],
            ])->first();
            
            if($code['code'] == $validated['code'] && $code['expires_at']>=now()){
                if($request->file('image')){
                    $image = $request->file('image');
                    $path = $image->store('images', 'public');

                    Account::create([
                        'email' => $validated['email'],
                        'password' => bcrypt($validated['password']),
                        'image' => $path,
                        'role' => $validated['role']
                    ]);
                }else{
                    Account::create([
                        'email' => $validated['email'],
                        'password' => bcrypt($validated['password']),
                        'role' => $validated['role']
                    ]);
                }
            }else{
                $code->delete();
                return response()->json([
                    'error' => "Código Invalido",
                ], 400);
            }

            $code->delete();
            return response()->json([
                'status' => "OK"
            ], 200);

        }catch(Exception $e){
            return response()->json([
                'error' => $e,
                'flag' => "está na api"
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            $user = Account::findbyId($id);

            return $user;
        }catch(Exception $e){
            return $e;
        }
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
        try{
            $validated = $request->validate([
                'email' => 'required|string|email|max:255',
                'password' => 'required|string|max:255|min:8|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*?&]/',
                'image' => 'mimes:jpg,jpeg,png,gif|image|max:2048',
                'status' => 'required|in:ACTIVE,INACTIVE',
                'role' => 'required|in:ADMINISTRATOR,COORDINATOR,MONITOR,STUDENT',
            ]);

            if($request->file('image')){
                $image = $request->file('image');
                $path = $image->store('images', 'public');

                Account::where('id', $id)->update([
                    'email' => $validated['email'],
                    'password' => $validated['password'],
                    'image' => $path,
                    'status' => $validated['status'],
                    'role' => $validated['role']
                ]);
            }else{
                Account::where('id', $id)->update([
                    'email' => $validated['email'],
                    'password' => $validated['password'],
                    'status' => $validated['status'],
                    'role' => $validated['role']
                ]);
            }

            return response()->json([
                'status' => "OK"
            ], 200);

        }catch(Exception $e){
            return $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            Account::destroy($id);
        }catch(Exception $e){
            return $e;
        }
    }
}
